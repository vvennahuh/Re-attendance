@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="attendance__container">
    <div class="attendance__status">
        @switch($status)
        @case('not_working')
        <span class="badge badge--gray">勤務外</span>
        @break
        @case('working')
        <span class="badge badge--black">出勤中</span>
        @break
        @case('resting')
        <span class="badge badge--gray">休憩中</span>
        @break
        @case('finished')
        <span class="badge badge--gray">退勤済</span>
        @break
        @endswitch
    </div>

    <div class="attendance__date">
        {{ \Carbon\Carbon::now()->format('Y年n月j日(D)') }}
    </div>

    <div class="attendance__time">
        {{ \Carbon\Carbon::now()->format('H:i') }}
    </div>

    <div class="attendance__action">
        @if($status === 'not_working')
        <form action="{{ route('attendance.start') }}" method="POST">
            @csrf
            <button class="btn btn--black" type="submit">出勤</button>
        </form>
        @elseif($status === 'working')
        <form action="{{ route('attendance.end') }}" method="POST" style="display: inline-block;">
            @csrf
            <button class="btn btn--black" type="submit">退勤</button>
        </form>
        <form action="{{ route('rest.start') }}" method="POST" style="display: inline-block;">
            @csrf
            <button class="btn btn--white" type="submit">休憩入</button>
        </form>
        @elseif($status === 'resting')
        <form action="{{ route('rest.end') }}" method="POST">
            @csrf
            <button class="btn btn--white" type="submit">休憩戻</button>
        </form>
        @elseif($status === 'finished')
        <div class="attendance__message">
            お疲れ様でした。
        </div>
        @endif
    </div>
</div>
@endsection