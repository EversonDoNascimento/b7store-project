<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\AdvertiseImage;
use App\Models\Category;
use App\Models\State;
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
        $ad = Advertise::where(["slug" => $slug])->first();
        if(!$ad){
            return \redirect()->to("/")->with('error', 'Anúncio não encontrado');
        }
        $ad->views++;
        $ad->save();
        $state = State::where(["id" => $ad->state_id])->first();
        $category = Category::where(["id" => $ad->category_id])->first();
        $ad['state'] = $state->name; 
        $ad['category'] = $category->name;
        $ad['main_image'] = AdvertiseImage::where(["advertise_id" => $ad->id])->where(["featured" => 1])->first();
        $ad["images"] = AdvertiseImage::where(["advertise_id" => $ad->id])->get();
        return view("single-ad", ["advertise" => $ad]);
    }
}
