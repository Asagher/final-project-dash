<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AccessRoles extends Controller {
    public function index() {
        $roles = Role::all();
        return view( 'content.apps.app-access-roles', compact( 'roles' ) );
    }

    public function store( Request $request ) {
        return $request;
    }
}
