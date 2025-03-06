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
        AdService::deleteAd($id);
    }

    public function show(String $slug){
        $ad = AdService::getSingleAd($slug);
        return view("single-ad", ["advertise" => $ad]);
    }
}
