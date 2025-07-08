@extends('layouts.admin')

@section('content')

<div class="auth-page">
    <h1 class="auth-title">Login</h1>

    <div class="auth-form">
        <form action="/login" method="post" class="auth-form__content">
        @csrf
            <div class="content">
                <p class="content-name">メールアドレス</p>
                <input type="email" name="email" class="content-item" placeholder="例:test@example.com" value="{{old('email')}}">
            </div>
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <div class="content">
                <p class="content-name">パスワード</p>
                <input type="password" name="password" class="content-item" placeholder="例:hvydgjojfg790k">
            </div>
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <div class="auth__button">
                <button 	class="auth__button-submit" type="submit">ログイン</button>
            </div>
            
        </form>
    </div>
</div>
@endsection