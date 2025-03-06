<?php

namespace App\Services;

use App\Models\Advertise;
use App\Models\AdvertiseImage;

class AdService {
    public static function getSingleAd(String $slug) {
        $ad = Advertise::where(["slug" => $slug])->first();
        if(!$ad){
            return \redirect()->to("/")->with('error', 'Anúncio não encontrado');
        }
        $ad->views++;
        $ad->save();
        $state = $ad->state;
        $category = $ad->category;
        $ad['state'] = $state->name; 
        $ad['category'] = $category->name;
        $ad['main_image'] = AdvertiseImage::where(["advertise_id" => $ad->id])->where(["featured" => 1])->first();
        $ad['images'] = $ad->images;

        return $ad;
    }
}