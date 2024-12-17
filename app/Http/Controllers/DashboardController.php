<?php

namespace App\Http\Controllers;

use App\Http\Requests\profileRequest;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function my_account(){
        $data['user'] = Auth::user();
        $data["states"] = State::all();
        return view("dashboard.my_account", $data);
    }
    public function my_account_action(profileRequest $request){
        $data = $request->only(["name", "email", "state"]);
        $findState = State::find($data['state']);
        if(!$findState){
            return \redirect(route("dashboard.my_account"));
        }
        $user = Auth::user();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->state_id = $data['state'];
        $user->save();
        return \redirect(route("dashboard.my_account"));

    }   
}
