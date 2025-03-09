<?php

namespace App\Services;

use App\Models\Category;

class CategoryService {
    public static function getAllCategories() {
        return Category::all();
    }
}