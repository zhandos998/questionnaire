@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Мои анкеты') }}</div>
                <div class="card-body">
                    <h2>{{$questionnaire->name}}</h2>
                    
                    <div class="list-group">
                    @foreach ($questions as $question)
                        <a class="list-group-item flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Вопрос: {{$question->question}}</h5>
                            </div>
                        @if (count(json_decode($question->answers))>1)
                            <div class="d-none">{{$i=1;}}</div>
                            @foreach (json_decode($question->answers) as $answer)
                                
                            <p class="mb-1">{{$i++}}){{$answer}}</p>
                            
                            @endforeach
                        @else
                            <p class="mb-1">Текст</p>
                        @endif
                        </a>
                    @endforeach
                    
                    </div>
                    
                    <a href="/admin/questioneds/{{$questionnaire->id}}">
                        <button type="button" class="btn btn-outline-primary mt-3">Анкетированные</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection