@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Мои анкеты') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">Название</th>
                            <th scope="col">Кол. вопросов</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questionnaires as $questionnaire)
                            <tr>
                                <th scope="row">{{$questionnaire->id}}</th>
                                <td><a href="/questionnaire/{{$questionnaire->id}}">{{$questionnaire->name}}</a></td>
                                <td>{{$questionnaire->questions_count}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection