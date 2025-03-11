<?php

namespace App\Http\Controllers;

use App\Services\AdService;
use App\Services\CategoryService;

class AdController extends Controller
{
    public function ad_delete($id){
        AdService::deleteAd($id);
    }

    public function list(){
       
        return view("list");
    }
    public function show(String $slug){
        $ad = AdService::getSingleAd($slug);
        $relatedAds = AdService::getRelatedAds($ad->category_id, $ad->state_id, $ad->id);

        return view("single-ad", ["advertise" => $ad, "relatedAds" => $relatedAds]);
    }

    public function category(String $slug){
        $category = CategoryService::getSingleCategory($slug);
        if(!$category){
            return redirect()->route("home");
        }
       $ads = AdService::getAdsByCategory($category->id);
       return view("category-list", ["category" => $category, "ads" => $ads]);
    }
}
