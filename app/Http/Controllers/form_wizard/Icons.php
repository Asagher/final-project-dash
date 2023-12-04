<?php

namespace App\Http\Controllers\form_wizard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ShipmentCategory;

class Icons extends Controller {
    public function index() {
        $categories = ShipmentCategory::all();
        return view( 'content.form-wizard.form-wizard-icons', compact( 'categories' ) );
    }

    public function getCategories() {
        $categories = ShipmentCategory::all();

        return response()->json( $categories );
    }

    public function getCategoryPrice( Request $request ) {
        $categoryId = $request->categoryName;

        $categoryName = ShipmentCategory::where( 'category_name', $categoryId )->first();
        return response()->json( [
            'price' => $categoryName->price_per_weight,
        ] );
    }
}