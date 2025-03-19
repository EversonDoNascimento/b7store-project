<?php

namespace App\Utils;

class DecryptId {
    public static function decryptId($id){
        if(!$id){
            return null;
        }
        try{
            return \decrypt($id);
        }catch(\Exception $e){
            return null;
        }
    } 
}
