<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class EcommerceProductCategory extends Controller {
    public function index() {
        $categories = Category::all();
        return view( 'content.apps.app-ecommerce-category-list', \compact( 'categories' ) );
    }
}