@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Проект менеджер') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        @if (session('status')[0]==1)
                            <div class="alert alert-success" role="alert">
                        @else
                            <div class="alert alert-danger" role="alert">
                        @endif
                            {{ session('status')[1] }}
                        </div>
                    @endif
                    <style>
                        td,th
                        {vertical-align: middle;}
                    </style>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Почта</th>
                            <th scope="col">Статус</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td><a href="/admin/user/{{$user->id}}">{{$user->name}}</a></td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->to_whom}}</td>
                                <td>
                                    <a href="/admin/change_to_whom/{{$user->id}}">
                                        <button type="button" class="btn btn-outline-primary">Change Status</button>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection