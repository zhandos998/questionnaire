@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $name }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Почта</th>
                            </tr>
                        </thead>
                        <tbody>
                            <h2 class="mb-3">Count: {{count($users)}}</h2>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td><a href="/admin/questioneds/{{$id}}/user-{{$user->id}}">{{$user->name}}</a></td>
                                <td>{{$user->email}}</td>
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