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
                            <th scope="col">Тип</th>
                            <th scope="col">Кол. вопросов</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <style>
                            td,th
                            {vertical-align: middle;}
                        </style>
                        <tbody>
                            @foreach ($questionnaires as $questionnaire)
                            <tr>
                                <th scope="row">{{$questionnaire->id}}</th>
                                <td><a href="/admin/questionnaire/{{$questionnaire->id}}">{{$questionnaire->name}}</a></td>
                                <td>{{$questionnaire->type_name}}</td>
                                <td>{{$questionnaire->questions_count}}</td>
                                <td>
                                    <a href="/admin/excel/{{$questionnaire->id}}">
                                        <button type="button" class="btn btn-outline-primary">To Excel</button>
                                    </a>
                                </td>
                                
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