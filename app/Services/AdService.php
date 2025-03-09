<?php

namespace App\Services;

use App\Models\Advertise;
use App\Models\AdvertiseImage;
use Exception;
use Illuminate\Support\Facades\Auth;

class AdService {


    public static function getAllAds() {
        $ads = Advertise::all();
        // $ads->each(function ($ad) {
        //     $ad['main_image'] = AdvertiseImage::where(["advertise_id" => $ad->id])->where(["featured" => 1])->first();
        //     $ad['images'] = $ad->images;
        // });
        return $ads;

    }
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
  

        return $ad;
    }

    public static function getRelatedAds($categoryId, $stateId, $adId) {
        $relatedAds = Advertise::where(["category_id" => $categoryId])->where(["state_id" => $stateId])->where("id", "<>", $adId)->orderBy("created_at", "desc")->orderBy("views", "desc")->limit(4)->get();
        return $relatedAds;
    }

    public static function deleteAd($id) {
        try {
            Advertise::where(["id" => $id])->where(["user_id" => Auth::user()->id])->first();
            return \redirect()->to("/")->with('success', 'Anúncio deletado com sucesso!');

        }catch(Exception $e) {
            return \redirect()->to("/")->with('error', 'Anúncio não encontrado');
        }
    }

    public static function filteredAds($categoryId , $stateId, $searchName) {
        $query = Advertise::query();
        if($categoryId) {
            $query->where(["category_id" => $categoryId]);
            
        }
        if($stateId) {
            $query->where(["state_id" => $stateId]);
        }
        
        if($searchName){
            $query->where("title", 'like', "%$searchName%");
        }

        return $query->paginate(12);
    }

 
}