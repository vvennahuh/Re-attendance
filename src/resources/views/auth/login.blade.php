@extends('layouts.app')

@section('title', 'ログイン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login-wrap">
    <h1 class="login-title">ログイン</h1>
    <form method="POST" action="{{ route('auth.login.store') }}" class="login-form">
        @csrf
        <div class="form-group">
            <label class="form-label">メールアドレス</label>
            <input class="form-input" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
            <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label">パスワード</label>
            <input class="form-input" type="password" name="password" required>
            @error('password')
            <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="login_button">
            <span class="login_button__text">ログインする</span>
        </button>

        <div class="auth-links">
            <a href="{{ route('register') }}">会員登録はこちら</a>
        </div>
    </form>
</div>
@endsection