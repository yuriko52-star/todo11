@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
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
    <form action="/categories" method="post">
        @csrf
        <div class="form-item">
            <div class="input-form">
                <input type="text" class="input" name="name" value="{{ old('name') }}">
            </div>
                
            <button class="btn" type="submit">作成</button>
            </div>
    </form>
        <table>
            <tr>
                <th>Category</th>
                <th></th>
            </tr>
             @foreach($categories as $category)
            <tr>
                <td>
                    <form action="/categories/update" class="edit-form" method="post">
                       @method('PATCH')
                       @csrf
                        <div class="text">
                            <input type="text" class="input-text" name="name" value="{{ $category['name'] }}">
                            <input type="hidden"name="id" value="{{ $category['id'] }}">
                        </div>
                        <div class="button">
                            <button type="submit" class="edit-btn">更新</button>
                        </div>
                        
                    </form>
                </td>

                <td>
                    <form action="/categories/delete" class="delete-form" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="button">
                            <input type="hidden" name="id" value="{{ $category['id'] }}">
                            <button class="delete-btn" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
           @endforeach
        </table>
</div>
@endsection