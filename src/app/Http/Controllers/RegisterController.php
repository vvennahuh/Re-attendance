<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request, CreateNewUser $creator)
    {
        // バリデーションはRegisterRequestで通過済み
        $user = $creator->create($request->validated());

        Auth::login($user);

        return redirect()->route('attendance'); // 登録後の遷移先（適宜変更）
    } //
}
