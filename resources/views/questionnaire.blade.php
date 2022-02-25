@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Мои анкеты') }}</div>
                <div class="card-body">
                    <h2>{{$questionnaire->name}}</h2>
                    <form action="/home " method="post">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <input class="d-none" name="questionnaire_id" value="{{$questionnaire->id}}">
                        <input class="d-none" name="type_id" value="{{$questionnaire->type_id}}">
                        <input class="d-none" name="to_whom" value="{{$questionnaire->to_whom}}">
                        <div class="list-group ms-3">
                            <div class="d-none">{{$i=1;}}</div>
                            @foreach ($questions as $question)
                                <div class="w-100 justify-content-between">
                                    <h5 class="mt-2 mb-3">{{$i}}) {{$question->question}}</h5>
                                    <input class="d-none" name="answers[{{$i}}][question]" value="{{$question->question}}">
                                @if (count(json_decode($question->answers))>1)
                                    <div class="d-none">{{$j=1;}}</div>
                                    @foreach (json_decode($question->answers) as $answer)
                                            <div class="form-check  ms-3">
                                                <input class="form-check-input" type="radio" name="answers[{{$i}}][answer]" value="{{$j}}">
                                                <label class="form-check-label">
                                                    {{$answer}}
                                                </label>
                                            </div>
                                            <div class="d-none">{{$j++;}}</div>
                                    @endforeach
                                @else
                                    <textarea name="answers[{{$i}}][answer]" class="form-textarea"></textarea>
                                @endif
                                
                                </div>
                                <div class="d-none">{{$i++;}}</div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-outline-primary ms-3 mt-2 mb-3">Готово</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection