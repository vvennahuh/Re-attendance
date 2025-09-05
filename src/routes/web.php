<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\CreatesNewUsers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth'])
    ->group(function () {
        Route::get('/attendance', [AttendanceController::class, 'index'])
            ->name('user.attendance.index');
    });
Route::post('/auth/login', function (LoginRequest $request) {
    $credentials = $request->validated();

    if (Auth::attempt($credentials, true)) {
        $request->session()->regenerate();
        return redirect()->route('user.attendance.index');
    }

    return back()
        ->withErrors(['email' => 'ログイン情報が登録されていません'])
        ->onlyInput('email');
})->name('auth.login.store');
Route::post('/auth/register', function (RegisterRequest $request, CreatesNewUsers $creator) {
    $user = $creator->create($request->validated());
    Auth::login($user);
    return redirect()->route('user.attendance.index');
})->name('auth.register.store');
