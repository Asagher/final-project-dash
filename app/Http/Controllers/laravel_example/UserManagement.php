<?php

namespace App\Http\Controllers\laravel_example;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserManagement extends Controller {
    /**
    * Redirect to user-management view.
    *
    */

    public function UserManagement() {
        $users = User::whereDoesntHave('roles', function ($query) {
          $query->where('name', 'العميل');
      })->get();
        $userCount = $users->count();
        $verified = User::whereNotNull( 'email_verified_at' )->whereDoesntHave('roles', function ($query) {
          $query->where('name', 'العميل');
      })
        ->get()
        ->count();
        $notVerified = User::whereNull( 'email_verified_at' )->whereDoesntHave('roles', function ($query) {
          $query->where('name', 'العميل');
      })
        ->get()
        ->count();
        $usersUnique = $users->unique( [ 'email' ] );
        $userDuplicates = $users->diff( $usersUnique )->count();
        $roles = Role::all();
        return view( 'content.laravel-example.user-management', [
            'totalUser' => $userCount,
            'verified' => $verified,
            'notVerified' => $notVerified,
            'userDuplicates' => $userDuplicates,
            'roles'=>$roles
        ] );
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index( Request $request ) {

        $columns = [
            1 => 'id',
            2 => 'name',
            3 => 'email',
            4 => 'email_verified_at',
            5 =>'role'
        ];

        $search = [];

        $totalData = User::count();

        $totalFiltered = $totalData;

        $limit = $request->input( 'length' );
        $start = $request->input( 'start' );
        $order = $columns[ $request->input( 'order.0.column' ) ];
        $dir = $request->input( 'order.0.dir' );

        if ( empty( $request->input( 'search.value' ) ) ) {
            $users = User::offset( $start )->whereDoesntHave('roles', function ($query) {
              $query->where('name', 'العميل');
          })
            ->limit( $limit )
            ->orderBy( $order, $dir )
            ->get();
        } else {
            $search = $request->input( 'search.value' );

            $users = User::where( 'id', 'LIKE', "%{$search}%" )
            ->orWhere( 'name', 'LIKE', "%{$search}%" )
            ->orWhere( 'email', 'LIKE', "%{$search}%" )
            ->offset( $start )
            ->limit( $limit )
            ->orderBy( $order, $dir )
            ->get();

            $totalFiltered = User::where( 'id', 'LIKE', "%{$search}%" )
            ->orWhere( 'name', 'LIKE', "%{$search}%" )
            ->orWhere( 'email', 'LIKE', "%{$search}%" )
            ->count();
        }

        $data = [];

        if ( !empty( $users ) ) {
            // providing a dummy id instead of database ids
            $ids = $start;

            foreach ( $users as $user ) {
                $nestedData[ 'id' ] = $user->id;
                $nestedData[ 'fake_id' ] = ++$ids;
                $nestedData[ 'name' ] = $user->name;
                $nestedData[ 'email' ] = $user->email;
                $nestedData[ 'email_verified_at' ] = $user->email_verified_at;
                $nestedData['role']=$user->getRoleNames();
                $data[] = $nestedData;
            }
        }

        if ( $data ) {
            return response()->json( [
                'draw' => intval( $request->input( 'draw' ) ),
                'recordsTotal' => intval( $totalData ),
                'recordsFiltered' => intval( $totalFiltered ),
                'code' => 200,
                'data' => $data,
            ] );
        } else {
            return response()->json( [
                'message' => 'Internal Server Error',
                'code' => 500,
                'data' => [],

            ] );
        }

    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $user = User::create( [
            'name' => $request->name,
            'contact'=>$request->contact,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make( $request->password ),
        ] )->assignRole( $request->types );
        $user->ownedTeams()->save( Team::forceCreate( [
            'user_id' => $user->id,
            'name' => explode( ' ', $user->name, 2 )[ 0 ]."'s Team",
            'personal_team' => true,
        ] ) );
        if ( $user )
        return response()->json( [ 'message' => 'created' ], 200 );
        else
        return response()->json( [ 'message' => 'already exits' ], 422 );

    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        $where = [ 'id' => $id ];

        $users = User::where( $where )->first();
        $users->getRoleNames();
        return response()->json( $users );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        $user = User::findOrFail( $id );
        // Update name
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->syncRoles( $request->types );
        // Save
        if ( $user->save() ) {
            return response()->json( [ 'message' => 'Updated' ], 200 );
        }
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        $users = User::where( 'id', $id )->delete();
    }
}
