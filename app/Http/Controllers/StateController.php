<?php

namespace App\Http\Controllers;

use App\Http\Requests\StateRequest;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StateController extends Controller
{
    public function index(){
        $states = State::all();
        return view('auth.select-state', ['states' => $states]);
    }

    public function register_state(StateRequest $request){
        $state = $request->only(["state"]);
       
        $stateRegister = State::where('name', $state['state'])->first();
        if(!$stateRegister){
            return \redirect("/login");
        }
        if(!Auth::check()){
            return \redirect("/login");
        }
        $user = Auth::user();
        $user['state_id'] = $stateRegister['id'];
        $user->save();
        return \redirect("/");
    }
}
