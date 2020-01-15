<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userJson() {
        $user = Auth::user();
        return json_encode($user);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->cpf = $request->cpf;
        $user->name = $request->name;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->save();
        return json_encode($user);
    }
}
