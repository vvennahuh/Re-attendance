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
    <header class="header-wrap">
        <div class="header-inner">
            <a href="{{ url('/attendance') }}" class="logo">
                <img src="{{ asset('img/COACHTECH.png') }}" alt="COACHTECH" />
            </a>

            @auth
            <nav class="global-nav">
                <ul>
                    @if(!$isAdmin)
                    <li>
                        <a class="{{ request()->routeIs('user.attendance.index') ? 'is-active' : '' }}"
                            href="{{ route('user.attendance.index') }}">勤怠</a>
                    </li>
                    <li>
                        <a class="{{ request()->routeIs('user.attendances.*') ? 'is-active' : '' }}"
                            href="{{ route('user.attendances.index') }}">勤怠一覧</a>
                    </li>
                    <li>
                        <a class="{{ request()->routeIs('user.requests.*') ? 'is-active' : '' }}"
                            href="{{ route('user.requests.index') }}">申請</a>
                    </li>
                    <li>
                        <form class="logout-form" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">ログアウト</button>
                        </form>
                    </li>
                    @else
                    <li>
                        <a class="{{ request()->routeIs('admin.attendances.*') ? 'is-active' : '' }}"
                            href="{{ route('admin.attendances.index') }}">勤怠一覧</a>
                    </li>
                    <li>
                        <a class="{{ request()->routeIs('admin.staff.*') ? 'is-active' : '' }}"
                            href="{{ route('admin.staff.index') }}">スタッフ一覧</a>
                    </li>
                    <li>
                        <a class="{{ request()->routeIs('admin.requests.*') ? 'is-active' : '' }}"
                            href="{{ route('admin.requests.index') }}">申請一覧</a>
                    </li>
                    <li>
                        <form class="logout-form" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">ログアウト</button>
                        </form>
                    </li>
                    @endif
                </ul>
            </nav>
            @endauth
        </div>
    </header>

<main class="main">
    @yield('content')
</main>

</body>

</html>