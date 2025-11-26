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
    <h2 class="form-title">新規作成</h2
            2>
            <form action="/todos" method="post">
                @csrf
        <div class="form-item">
            
            
            <div class="input-form">
                <input type="text" class="input" name="content">
            </div>
            <select name="category_id" class="select">
                <option value="" class="">カテゴリ</option>
                @foreach($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
            <button class="btn" type="submit">作成</button>
            </div>
    </form>
    <h2 class="form-title">Todo検索</h2>
    <form action="/todos/search" method="get" class="search-form">
        @csrf
        <div class="form-item">
            <div class="input-form">
                <input type="text" class="input" name="keyword" value="{{ old('keyword') }}">
            </div>
            <select name="category_id" class="select">
                <option value="" id="">カテゴリ</option>
                @foreach($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
            <button class="btn" type="submit">検索</button>
            
        </div>
    </form>
    <div class="todo-table">
        <table>
            <tr class="tr">
                <th>
                    <span>Todo</span>
                    <span>カテゴリ</span>
                    
                </th>
                <th></th>
            </tr>
            @foreach($todos as $todo)
            <tr>
                <tbody>
                <td>
                    <form action="/todos/update" class="edit-form" method="post">
                       @method('PATCH')
                       @csrf
                        <div class="text">
                            <input type="text" class="input-text" name="content" value="{{ $todo['content']}}">
                            <input type="hidden"name="id" value="{{ $todo['id'] }}">
                            </div>
                            <p>{{ $todo->category->name}}</p>
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
                </tbody>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection