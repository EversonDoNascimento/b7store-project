<?php

namespace App\Utils;

use Exception;
use Illuminate\Support\Facades\Storage;

class DeleteLocalImages {
    public static function deleteImage($image) {
        try{
            return Storage::disk('public')->delete($image);
        }catch(Exception $e){
            return false;
        }      
    }
}