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
                    <form id="form" action="/admin/excel/{{$id}}" method="post">
                        @csrf
                        <input type="date" name="date_before" class="form-control mb-3">
                        <input type="date" name="date_after" class="form-control mb-3">
                        
                        <button type="submit" class="btn btn-primary">Готово!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection