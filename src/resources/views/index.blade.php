@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
@if(session('message'))
<div class="success-message">
    {{ session('message') }}
</div>
@endif
@if($errors->any())
<div class="error-message">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="wrapper">
    <form action="/todos" method="post">
        @csrf
        <div class="form-item">
            <div class="input-form">
                <input type="text" class="input" name="content">
            </div>
                
            <button class="btn" type="submit">作成</button>
            </div>
    </form>
        <table>
            <tr>
                <th>Todo</th>
                <td></td>
            </tr>
             @foreach($todos as $todo)
            <tr>
                <td>
                    <form action="/todos/update" class="edit-form" method="post">
                       @method('PATCH')
                       @csrf
                        <div class="text">
                            <input type="text" class="input-text" name="content" value="{{ $todo['content']}}">
                            <input type="hidden"name="id" value="{{ $todo['id'] }}">
                        </div>
                        <div class="button">
                            <button type="submit" class="edit-btn">更新</button>
                        </div>
                        
                    </form>
                </td>

                <td>
                    <form action="/todos/delete" class="delete-form" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="button">
                            <input type="hidden" name="id" value="{{ $todo['id'] }}">
                            <button class="delete-btn" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
</div>
@endsection