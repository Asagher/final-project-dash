<?php

namespace Database\Seeders;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder {
    /**
    * Run the database seeds.
    */

    public function run(): void {

        $user = User::create( [
            'name' => 'admin',
            'email' =>  'admin@gmail.com',
            'email_verified_at' => now(),
            'password' =>Hash::make( '12345678' ), // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random( 10 ),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ] )->assignRole( 'user', 'admin' );
        Team::create( [
            'name' => explode( ' ', $user->name, 2 )[ 0 ]."'s Team",
            'user_id' => $user->id,
            'personal_team' => true,
        ] );
    }

}