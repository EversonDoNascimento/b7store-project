<?php

namespace App\Services;

use App\Models\Advertise;
use App\Models\AdvertiseImage;
use App\Utils\DeleteLocalImages;
use Exception;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;

class AdService {


    public static function getAllAds() {
        $ads = Advertise::orderBy("created_at", "desc")->limit(4)->get();
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
            $ad = Advertise::where(["id" => $id])->where(["user_id" => Auth::user()->id])->first();
            foreach($ad->images as $image) {
                DeleteLocalImages::deleteImage($image->url);
            };
            $ad->delete();
            return true;
        }catch(Exception $e) {
            return false;
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

        return $query->orderBy("created_at", "desc")->paginate(4);
    }

    public static function getAdsByCategory($categoryId) {
        $ads = Advertise::where("category_id", $categoryId)->with('images')->orderBy("created_at", "desc")->paginate(8);
        return $ads;
    }

    public static function saveImagesInStorage($ad){
        if(!$ad || !$ad->images){ 
            return null;
        }
        if($ad->selectedImage){
            AdService::changeMainImage($ad);
        }
        foreach($ad->images as $image){
            $imageAdvertise = new AdvertiseImage();
            $imageAdvertise->url = $image->store('images', 'public');
            if($ad->selectedImage && \method_exists($ad->selectedImage, 'temporaryUrl')){
                $imageAdvertise->featured = $image->temporaryUrl() == $ad->selectedImage->temporaryUrl() ? true : false;
            } else{
                $imageAdvertise->featured = false;
            }
            $imageAdvertise->advertise_id = $ad->id;
            $imageAdvertise->save();
        }
    }

    public static function changeMainImage($ad){
        if(!$ad) return null;
        $oldFeaturedImage = AdvertiseImage::where('advertise_id', $ad->id)->where('featured', 1)->first();
        // Verifying if the main image changed
        if($oldFeaturedImage->url == $ad->selectedImage) return null;
        $oldFeaturedImage->featured = false;
        $oldFeaturedImage->save();
    }

    public static function createAd($ad){
        $newAd = new Advertise();
        $category = CategoryService::getSingleCategoryById($ad->category);
        
        // Defined the advertise values
        $newAd->title = $ad->title;
        $newAd->price = str_replace(',', '.', str_replace('.', '', $ad->value));
        $newAd->description = $ad->description;
        $newAd->category_id = $ad->category;
        $newAd->slug = $category->slug . "-" . Random::generate(100);
        $newAd->state_id = Auth::user()->state_id;
        $newAd->contact = "55819888888";
        $newAd->negotiable = $ad->negotiable;
        $newAd->views = 0;
        $newAd->user_id = Auth::user()->id;
        // Defined the images of advertise
        $newAd->save();
        foreach($ad->images as $image){
            $imageAdvertise = new AdvertiseImage();
            $imageAdvertise->url = $image->store('images', 'public');
            $imageAdvertise->featured = $image->temporaryUrl() == $ad->selectedImage->temporaryUrl() ? true : false;
            $imageAdvertise->advertise_id = $newAd->id;
            $imageAdvertise->save();
        }
     
    }

    public static function  editAd($ad){

    }

    public static function getSingleAdById($id){
        $ad = Advertise::where(['id' => $id])->where(['user_id' => Auth::user()->id])->first();
        return $ad;
    }
 
}