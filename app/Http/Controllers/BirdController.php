<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bird;

class BirdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $user_id = Auth::user()->id;
        $birds = Bird::where('user_id', '=', $user_id)->get();

        return json_encode($birds);

    }

    public function show($id) {
        $bird = Bird::find($id);
        return json_encode($bird);
    }

    public function update(Request $request, $anilhaCode) {
        $bird = Bird::find($anilhaCode);
        $bird->anilhaCode = $request->anilhaCode;
        $bird->name = $request->name;
        $bird->age = $request->age;
        $bird->gender = $request->gender;
        $bird->category = $request->category;
        $bird->save();
        return json_encode($bird);
    }
}
