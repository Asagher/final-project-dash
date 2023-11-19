<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AccessRoles extends Controller {
    public function index() {
        $permissions = Permission::all();
        $roles = Role::all();
        foreach($roles as $role)
        $query =DB::table('model_has_roles')->get('role_id');
        return view( 'content.apps.app-access-roles',
        [ 'permissions' =>$permissions,
        'roles' =>$roles ,
        'total'=>$query
         ] );
    }

}