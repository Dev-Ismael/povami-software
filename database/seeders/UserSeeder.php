<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Str;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $users = 
        // [
        //     [    
        //         'name' => 'abdulrahman ismael',
        //         'email' => 'dev.ismael305@gmail.com',
        //         'email_verified_at' => now(),
        //         'password' => Hash::make('password'), 
        //         'remember_token' => Str::random(10),
        //         // 'phone' => '01210811347',
        //         // 'balance' => '25.35$',
        //         'role' => '1',      // 1=>Admin , 2=>Affiliate , 1=>user , 
        //         // 'coupon' => Str::random(9),
        //     ],
        //     [    
        //         'name' => 'marwan ismael',
        //         'email' => 'marwan@gmail.com',
        //         'email_verified_at' => now(),
        //         'password' => Hash::make('password'), 
        //         'remember_token' => Str::random(10),
        //     ]
        // ];
        
        // foreach($users as $user){
        //     DB::table('users')->insert($user);
        // }

        User::factory()->count(50)->create();


        
    }
}
