@extends('layouts.app')

@section('title', '会員登録')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register-wrap">
    <h1 class="register-title">会員登録</h1>
    <form method="POST" action="{{ route('auth.register.store') }}" class="register-form">
        @csrf
        <div class="form-group">
            <label class="form-label">名前</label>
            <input class="form-input" type="text" name="name" value="{{ old('name') }}" required>
            @error('name')
            <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
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
        <div class="form-group">
            <label class="form-label">パスワード確認</label>
            <input class="form-input" type="password" name="password_confirmation" required>
            @error('password_confirmation')
            <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="register_button">
            <span class="register_button__text">登録する</span>
        </button>

        <div class="auth-links">
            <a href="{{ route('login') }}">ログインはこちら</a>
        </div>
    </form>
</div>
@endsection