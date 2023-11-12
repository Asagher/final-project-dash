<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class AccessPermission extends Controller {
    public function index() {
        return view( 'content.apps.app-access-permission' );
    }

    public function store( Request $request ) {
        $PermissionID = $request->id;

        if ( $PermissionID ) {
            // update the value
            $Permissions = Permission::updateOrCreate( [ 'id' => $PermissionID ], [ 'name' => $request->modalPermissionName, 'guard_name' => 'web' ] );

            //     // user updated
            //     return response()->json( 'Updated' );
            // } else {
            //     // create new one if email is unique
            //     $PermissionName = Permission::where( 'name', $request->name )->first();

            //     if ( empty( $PermissionName ) ) {
            //         $Permissions = Permission::updateOrCreate( [ 'id' => $PermissionID ], [ 'name' => $request->name, 'guard_name' => 'web' ] );

            //         // user created
            //         return response()->json( 'Created' );
            //     } else {
            //         // user already exist
            //         return response()->json( [ 'message' => 'already exits' ], 422 );
            // }
            // }
        }
    }
}