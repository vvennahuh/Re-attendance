@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/list.css') }}">
@endsection

@section('content')
<div class="list__container">
    <h2 class="list__title">勤怠一覧</h2>

    <div class="list__nav">
        <form method="GET" action="{{ route('attendances.list', ['month' => $previousMonth]) }}">
            <button>&larr; 前月</button>
        </form>
        <span><i class="fa fa-calendar"></i> {{ $currentMonth->format('Y/m') }}</span>
        <form method="GET" action="{{ route('attendances.list', ['month' => $nextMonth]) }}">
            <button>翌月 &rarr;</button>
        </form>
    </div>

    <table class="list__table">
        <thead>
            <tr>
                <th>日付</th>
                <th>出勤</th>
                <th>退勤</th>
                <th>休憩</th>
                <th>合計</th>
                <th>詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
            <tr>
                <td>{{ $attendance->work_date->format('m/d(D)') }}</td>
                <td>{{ $attendance->start_time }}</td>
                <td>{{ $attendance->end_time }}</td>
                <td>{{ $attendance->rest_duration }}</td>
                <td>{{ $attendance->total_work_duration }}</td>
                <td><a href="{{ route('attendances.show', $attendance->id) }}">詳細</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>