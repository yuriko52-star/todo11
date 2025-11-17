@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="success-message">Todoを作成しました</div>
<div class="wrapper">
    <form action="" class="">
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
            <tr>
                <td>
                    <form action="" class="edit-form">
                        <div class="text">
                            <input type="text" class="input-text" name="content" value="test">
                        </div>
                        <div class="button">
                            <button type="submit" class="edit-btn">更新</button>
                        </div>
                        
                    </form>
                </td>

                <td>
                    <form action="" class="delete-form">
                        <div class="button">
                            <button class="delete-btn" type="submit">削除</button>
                        </div>
                    </form>
                </td>
                    
            </tr>
        </table>
</div>
@endsection