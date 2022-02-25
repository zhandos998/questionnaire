<?php

namespace App\Http\Controllers;

use App\Models\Questioned;
use App\Models\Questionnaire;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *SS
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // dd($request);
        if(Auth::user()->hasRole('project-manager')){
            return redirect('/admin');
        }
        $user = Auth::user();

        if ($request->isMethod("post")){
            $request->validate([
                'answers.*.answer' => 'required',
            ]);
            // dd($request);
            $questioned = new Questioned();
            $questioned->user_id = $user->id;
            $questioned->questionnaire_id = $request->questionnaire_id;
            $questioned->type_id = $request->type_id;
            $questioned->to_whom = $request->to_whom;
            $questioned->answers = json_encode($request->answers);
            $questioned->save();
            return redirect('/home')->with('status',[1,"Анкета добавлена!"]);
        }
        
        return view('home',['user' => $user]);
    }

    public function questionnaires()
    {
        $questionnaires = DB::table('questionnaires')
        ->where('to_whom',Auth::user()->to_whom)
        ->get();
        return view('questionnaires',['questionnaires' => $questionnaires]);
    }

    public function questionnaire($id)
    {

        $questionnaire = DB::table("questionnaires")->where('id',$id)->where('to_whom',Auth::user()->to_whom)->first();
        // dd($questionnaire);
        if (!$questionnaire)
            return redirect('/home')->with(['status' => [0,"Ошибка!"]]);
        $questions = DB::table("questions")->where('questionnaire_id',$id)->get();
        if (DB::table("questioneds")->where('questionnaire_id',$id)->where('user_id',Auth::id())->count() > 0)
            return redirect('/home')->with(['status' => [0,"Вы уже проходили анкетирование!"]]);
        
        return view('questionnaire',["questionnaire"=> $questionnaire,"questions"=> $questions]);
    }
}
