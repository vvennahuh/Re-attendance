<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '勤怠管理システム')</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__logo">
                <img src="{{ asset('img/coachtech.png') }}" alt="COACHTECH">
            </div>
            <nav class="header__nav">
                @auth
                @if(Auth::user()->is_admin)
                <a href="{{ route('admin.attendance.index') }}">勤怠一覧</a>
                <a href="{{ route('admin.staff.index') }}">スタッフ一覧</a>
                <a href="{{ route('admin.request.index') }}">申請一覧</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="header__logout">ログアウト</button>
                </form>
                @else
                <a href="{{ route('attendance.index') }}">勤怠</a>
                <a href="{{ route('attendance.list') }}">勤怠一覧</a>
                <a href="{{ route('request.index') }}">申請</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="header__logout">ログアウト</button>
                </form>
                @endif
                @endauth
            </nav>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>
</body>

</html>