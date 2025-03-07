<?php

namespace App\Http\Controllers;
use App\Services\AdService;


class AdController extends Controller
{
    public function ad_delete($id){
        AdService::deleteAd($id);
    }

    public function show(String $slug){
        $ad = AdService::getSingleAd($slug);
        $relatedAds = AdService::getRelatedAds($ad->category_id, $ad->state_id, $ad->id);
        return view("single-ad", ["advertise" => $ad, "relatedAds" => $relatedAds]);
    }
}
