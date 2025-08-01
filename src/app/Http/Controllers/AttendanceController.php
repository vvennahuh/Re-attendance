<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Attendance;
use App\Models\Rest;

class AttendanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $today = Carbon::today();

        $attendance = Attendance::where('user_id', $user->id)
                                ->whereDate('work_date', $today)
                                ->first();

        $status = 'not_working'; // デフォルトは未出勤

        if ($attendance) {
            if ($attendance->end_time) {
                $status = 'finished'; // 退勤済み
            } elseif ($attendance->start_time) {
                $latestRest = Rest::where('attendance_id', $attendance->id)
                ->orderByDesc('start_time')
                ->first();

                if ($latestRest && !$latestRest->end_time) {
                    $status = 'resting'; // 休憩中
                } else {
                    $status = 'working'; // 出勤中
                }
            }
        }

        return view('attendance', [
            'user' => $user,
            'status' => $status,
            'attendance' => $attendance,
            'now' => Carbon::now(),
        ]);
    }//
}
