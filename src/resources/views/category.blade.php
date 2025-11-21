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
    <form action="/" method="post">
        @csrf
        <div class="form-item">
            <div class="input-form">
                <input type="text" class="input" name="name">
            </div>
                
            <button class="btn" type="submit">作成</button>
            </div>
    </form>
        <table>
            <tr>
                <th>Category</th>
                <td></td>
            </tr>
             
            <tr>
                <td>
                    <form action="" class="edit-form" method="post">
                       @method('PATCH')
                       @csrf
                        <div class="text">
                            <input type="text" class="input-text" name="name" value="">
                            <input type="hidden"name="id" value="">
                        </div>
                        <div class="button">
                            <button type="submit" class="edit-btn">更新</button>
                        </div>
                        
                    </form>
                </td>

                <td>
                    <form action="" class="delete-form" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="button">
                            <input type="hidden" name="id" value="">
                            <button class="delete-btn" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
           
        </table>
</div>
@endsection