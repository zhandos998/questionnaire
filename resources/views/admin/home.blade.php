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
                    
                    @if (isset($user))
                        <h2 class="mb-3">{{ "Здравствуйте ".$user->name."!" }}</h2>
                    @endif
                    <a href="/admin/add_questionnaire">
                        <button type="button" class="btn btn-outline-primary">Добавить анкету</button>
                    </a>
                    <a href="/admin/my_questionnaire">
                        <button type="button" class="btn btn-outline-primary">Мои анкеты</button>
                    </a>
                    <a href="/admin/users">
                        <button type="button" class="btn btn-outline-primary">Users</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection