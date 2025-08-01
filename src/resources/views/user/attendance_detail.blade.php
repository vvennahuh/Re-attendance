@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="detail-container">
    <h2 class="detail-title">勤怠詳細</h2>
    <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')

        <table class="detail-table">
            <tr>
                <th>名前</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>日付</th>
                <td>{{ \Carbon\Carbon::parse($attendance->work_date)->format('Y年n月j日') }}</td>
            </tr>
            <tr>
                <th>出勤・退勤</th>
                <td class="time-range">
                    <input type="time" name="start_time" value="{{ old('start_time', optional($attendance->start_time)->format('H:i')) }}">
                    @error('start_time')
                    <div class="error">{{ $message }}</div>
                    @enderror

                    〜

                    <input type="time" name="end_time" value="{{ old('end_time', optional($attendance->end_time)->format('H:i')) }}">
                    @error('end_time')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <th>休憩</th>
                <td class="time-range">
                    <input type="time" name="rest_start_1" value="{{ old('rest_start_1', optional($rests[0]->start_time ?? null)->format('H:i')) }}">
                    〜
                    <input type="time" name="rest_end_1" value="{{ old('rest_end_1', optional($rests[0]->end_time ?? null)->format('H:i')) }}">
                    @error('rest_start_1')<div class="error">{{ $message }}</div>@enderror
                    @error('rest_end_1')<div class="error">{{ $message }}</div>@enderror
                </td>
            </tr>
            <tr>
                <th>休憩2</th>
                <td class="time-range">
                    <input type="time" name="rest_start_2" value="{{ old('rest_start_2', optional($rests[1]->start_time ?? null)->format('H:i')) }}">
                    〜
                    <input type="time" name="rest_end_2" value="{{ old('rest_end_2', optional($rests[1]->end_time ?? null)->format('H:i')) }}">
                    @error('rest_start_2')<div class="error">{{ $message }}</div>@enderror
                    @error('rest_end_2')<div class="error">{{ $message }}</div>@enderror
                </td>
            </tr>
            <tr>
                <th>備考</th>
                <td>
                    <textarea name="note">{{ old('note', $attendance->note) }}</textarea>
                    @error('note')<div class="error">{{ $message }}</div>@enderror
                </td>
            </tr>
        </table>

        @if ($attendance->is_request_pending)
        <p class="alert">＊承認待ちのため修正はできません。</p>
        @else
        
        <div class="submit-button-container">
            <button type="submit" class="submit-button">修正</button>
        </div>
    </form>
</div>
@endsection