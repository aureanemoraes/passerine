<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bird;
use App\User;

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
        if($bird) return json_encode($bird);
        else return response('Houve um erro ao salvar suas modificações. Por favor, tente novamente.', 500);
    }

    public function store(Request $request) {
        $bird = new Bird();
        $user = User::find($request->user_id);
        $bird->anilhaCode = $request->anilhaCode;
        $bird->name = $request->name;
        $bird->age = $request->age;
        $bird->gender = $request->gender;
        $bird->category = $request->category;
        $bird->user()->associate($user);
        $bird->save();
        if($bird) return json_encode($bird);
        else return response('Houve um erro ao salvar o novo pássaro. Por favor, tente novamente.', 500);
    }

    public function destroy($anilhaCode) {
        $bird = Bird::where('anilhaCode', '=', $anilhaCode)->first();
        if(isset($bird)) {
            $bird->delete();
            return response('OK', 200);
        }
        return response('Erro', 500);
    }
}
