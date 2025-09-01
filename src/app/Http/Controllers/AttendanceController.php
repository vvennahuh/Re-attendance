<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Attendance;
use App\Models\Rest;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return view('user.index', compact('user'));
    }//
}
