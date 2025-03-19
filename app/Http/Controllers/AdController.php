<?php

namespace App\Http\Controllers;

use App\Services\AdService;
use App\Services\CategoryService;
use App\Utils\DecryptId;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function ad_delete($id){
        $idDecrypted = DecryptId::decryptId($id);
        if(!$idDecrypted){
            return \redirect()->route('home');
        }
        $resultDelete = AdService::deleteAd($idDecrypted);
        if(!$resultDelete){
            return redirect()->route("dashboard.my_ads")->with("error", "Erro ao deletar anuncio");
        }
        return redirect()->route("dashboard.my_ads")->with("success", "Anuncio deletado com sucesso");
    }

    public function ad_edit($id){
        return view('dashboard.ad_edit', ['id' => $id]);
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

    public function create_advertise(){
        return view("dashboard.ad_create");
    }
}
