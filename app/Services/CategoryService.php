<?php

namespace App\Services;

use App\Models\Category;

class CategoryService {
    public static function getAllCategories() {
        return Category::all();
    }

    public static function getSingleCategory($slug){
        return Category::where('slug', $slug)->first();
    }
}