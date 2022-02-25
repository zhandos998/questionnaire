@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire_name.' '.$user_email }}</div>
                <div class="card-body">
                    <div class="list-group">
                        <div class="d-none">{{$i=1;}}</div>
                        @foreach (json_decode($questionnaires->answers) as $answer)
                        <a class="list-group-item flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Вопрос {{$i++}}: {{$answer->question}}</h5>
                            </div>
                            <p class="mb-1">{{$answer->answer}}</p>
                        </a>
                        @endforeach
                    </div>
                    @if ($myers_briggs)
                        {{$myers_briggs->title}}<br>
                        {{$myers_briggs->discription}}<br>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection