<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\AdvertiseImage;
use App\Models\Category;
use App\Models\State;
use App\Services\AdService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function ad_delete($id){
        
        $ad = Advertise::where(["id" => $id])->where(["user_id" => Auth::user()->id])->first();
        if(!$ad){
            return \redirect()->back()->with('error', 'Anúncio não encontrado');
        }
        $ad->delete();
        return \redirect()->back()->with('success', 'Anúncio deletado com sucesso!');
    }

    public function show(String $slug){
        $ad = AdService::getSingleAd($slug);
        return view("single-ad", ["advertise" => $ad]);
    }
}
