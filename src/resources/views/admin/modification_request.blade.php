@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/modification_request.css') }}">
@endsection

@section('content')
<div class="request-container">
    <h2 class="request-title">申請一覧</h2>

    <div class="tab-menu">
        <button class="tab active">承認待ち</button>
        <button class="tab">承認済み</button>
    </div>

    <table class="request-table">
        <thead>
            <tr>
                <th>状態</th>
                <th>名前</th>
                <th>対象日時</th>
                <th>申請理由</th>
                <th>申請日時</th>
                <th>詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
            <tr>
                <td>{{ $request->status }}</td>
                <td>{{ $request->user->name }}</td>
                <td>{{ $request->target_date->format('Y/m/d') }}</td>
                <td>{{ $request->reason }}</td>
                <td>{{ $request->submitted_at->format('Y/m/d') }}</td>
                <td><a href="{{ route('requests.show', $request->id) }}">詳細</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection