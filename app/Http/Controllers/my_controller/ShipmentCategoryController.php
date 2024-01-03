<?php

namespace App\Http\Controllers\my_controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\SaveImageTrait;
use App\Models\ShipmentCategory;

class ShipmentCategoryController extends Controller {
    use SaveImageTrait;
    /**
    * Display a listing of the resource.
    */

    public function index() {
        //
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        $file_name = $this->saveImage( $request->img, '/assets/img/category/' );
        $category = ShipmentCategory::create( [
            'category_name' => $request->categoryTitle,
            'photo' => $file_name
        ] );
        if ( $category ) {
            // user updated
            return response()->json( [ 'message' => 'created' ], 200 );
        } else {
            return response()->json( [ 'message' => 'error' ], 401 );
        }
    }

    /**
    * Display the specified resource.
    */

    public function show( $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        $category = ShipmentCategory::where( 'category_id', $id )->first();
        if ( $category ) {
            return response()->json( $category );
        }
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request,  $id ) {
        $category = ShipmentCategory::findOrFail( $id );
        // Update record
        $category->update(['category_name'=> $request->categoryTitle]);

        if ( $category ) {
            return response()->json( [ 'message' => 'Updated' ], 200 );
        }
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy(  $id ) {
      $roles = ShipmentCategory::where( 'category_id', $id )->delete();
    }
}
