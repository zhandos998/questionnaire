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
                    <form id="form" action="/admin/change_to_whom/{{$id}}" method="post">
                        @csrf 
                        <h2 class="mb-3">{{$user->name}}</h2>
                        <select name="to_whom" class="form-select">
                            <option selected>Выберите для кого</option>
                            @foreach ($to_whom as $item)
                                <option value="{{$item->id}}" @if ($item->id == $user->to_whom) selected @endif>
                                    {{$item->name}}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">Готово!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection