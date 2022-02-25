<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Writer;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:project-manager');
    }

    /**
     * Show the application dashboard.
     *SS
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index(Request $request)
    {
        // len >= 1
        // question len >= 2
        if ($request->isMethod("post")){
            $request->validate([
                'name' => 'required|max:255',
                'to_whom' => 'required',
                'q.*.question' => 'required|max:500',
                'q.*.answers.*' => 'required',
            ]);
            $num = DB::select("SHOW TABLE STATUS LIKE 'questionnaires'")[0]->Auto_increment;
            $questionnaire = new Questionnaire();
            $questionnaire->name = $request->name;
            if ($request->type_id)
                $questionnaire->type_id = $request->type;
            else $questionnaire->type_id = 1;
            $questionnaire->questions_count = count($request->q);
            $questionnaire->to_whom = $request->to_whom;
            $questionnaire->save();
            foreach ($request->q as $value){
                $question = new Question();
                $question->questionnaire_id = $num; 
                $question->question = $value['question'];
                $question->answers = json_encode($value['answers']);
                $question->save();
            }
            // return view('admin.home',['is_append' => true]);
            return redirect('/admin')->with('status',[1,"Анкета добавлена!"]);
        }
        $user = Auth::user();
        return view('admin.home',['user' => $user]);
    }
    public function add_questionnaire()
    {
        $next_id = DB::select("SHOW TABLE STATUS LIKE 'questionnaires'")[0]->Auto_increment;
        $questionnaire_types = DB::table("questionnaire_types")
        ->get();
        $to_whom = DB::table("to_whom")
        ->get();
        return view('admin.addQuestionnaire',["next_id"=> $next_id,"questionnaire_types"=> $questionnaire_types,"to_whom"=> $to_whom]);
    }
    public function my_questionnaire()
    {
        $questionnaires = DB::table("questionnaires")
        ->join("questionnaire_types","questionnaires.type_id","=","questionnaire_types.id")
        ->select('questionnaires.id','questionnaires.name','questionnaires.questions_count','questionnaire_types.name as type_name')
        ->get();
        return view('admin.myQuestionnaire',["questionnaires"=> $questionnaires]);
    }
    public function questionnaire($id)
    {
        $questionnaire = DB::table("questionnaires")->where('id',$id)->first();
        $questions = DB::table("questions")->where('questionnaire_id',$id)->get();
        return view('admin.questionnaire',["questionnaire"=> $questionnaire,"questions"=> $questions]);
    }
    public function questioned($id)
    {
        $users = DB::table('questioneds')
        ->where('questionnaire_id',$id)
        ->join('users', 'users.id', '=', 'questioneds.user_id')
        ->where('users.to_whom',2)
        ->get(['users.id','users.name','users.email']);

        $name = DB::table('questionnaires')
        ->where('id',$id)
        ->first('name')
        ->name;

        return view('admin.questioned',['users'=>$users,'name'=>$name ,'id'=>$id]);
    }
    public function questioned_user($id,$user_id)
    {
        DB::table('users')->where('id',$user_id)->first('to_whom')->to_whom;
        if (!(DB::table('users')->where('id',$user_id)->first('to_whom')->to_whom == 2))
            return abort(404);
        $questionnaire_name = DB::table('questionnaires')->where('id',$id)->first('name')->name;
        $user_email = DB::table('users')->where('id',$user_id)->first('email')->email;
        $questionnaires = DB::table('questioneds')->where('user_id',$user_id)->where('questionnaire_id',$id)->first();
        $code = "";
        foreach (json_decode($questionnaires->answers) as $answer) {
            $code.=$answer->answer;
        }
        $myers_briggs = [];
        if ($questionnaires->type_id == 2)
        {    
            $myers_briggs = DB::table('myers_briggs')
            ->where('code',$code)
            ->first();
        }
        // dd($myers_briggs);
        return view('admin.questioned_user',['questionnaires'=>$questionnaires,'questionnaire_name'=>$questionnaire_name,'user_email'=>$user_email,"myers_briggs" =>$myers_briggs]);
    }

    public function users()
    {
        $users = DB::table('users')->get();
        return view('admin.users',['users'=>$users]);
    }

    public function user($id)
    {
        $user = DB::table('users')
        ->where('id',$id)
        ->first();
        return view('admin.user',['user'=>$user]);
    }

    public function change_to_whom(Request $request,$id)
    {
        if ($request->isMethod("post")){
            $request->validate([
                'to_whom' => 'required',
            ]);
            DB::table('users')
            ->where('id', $id)
            ->update(['to_whom' => $request->to_whom]);
            return redirect('/admin/user/'.$id)->with('status',[1,"Статус изменен!"]);
        }
        $user = DB::table('users')
        ->where('id',$id)
        ->first();
        $to_whom = DB::table("to_whom")
        ->get();
        return view('admin.change_to_whom',['user'=>$user,'to_whom'=>$to_whom,'id'=>$id]);
    }

    public function excel(Request $request,$id)
    {
        if ($request->isMethod("post")){
            $results = DB::table('questioneds')
            ->where('questionnaire_id',$id);

            if ($request->date_before)
            $results = $results->where('created_at','>=',$request->date_before);

            if ($request->date_after)
            $results = $results->where('created_at','<=',date_create($request->date_after)->modify('+1 day'));

            $results = $results->get();
            $answers = array_fill(0,count((array)json_decode($results[0]->answers)),[]);
            $questions = [];
            
            foreach ($results as $iter_i => $all_answers) {
                foreach (json_decode($all_answers->answers) as $iter_j => $answer) {
                    if ($iter_i==0){
                        array_push($questions,((array)json_decode($all_answers->answers))[$iter_j]->question);
                    }
                    array_push($answers[$iter_j-1],$answer->answer);
                }
            }
            file_put_contents('answers.json', json_encode($answers));
            file_put_contents('questions.json', json_encode($questions));
            system("python C:\\Users\\zhandos998\\Desktop\\test\\script.py");
            
            $filename=date_format(date_create($request->date_before),"dmY").'-'.date_format(date_create($request->date_after),"dmY").'-id-'.$id.'.xlsx';

            $file= public_path(). "\\storage\\pie.xlsx";
            $headers = array(
                        'Content-Type: application/pdf',
                        'Content-disposition: attachment; filename='.'pie.xlsx',
                        'Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'Content-Length: ' . filesize($file),
                        'Content-Transfer-Encoding: binary',
                        'Cache-Control: must-revalidate',
                        'Pragma: public'
                    );
            ob_clean();
        
            return response()->download($file, $filename,$headers);
        }
        return view('admin.excel',['id'=>$id]);
    }
}
