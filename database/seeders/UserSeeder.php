<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        User::create([
            'username' => 'Admin',                
            'email' => 'admin@admin.com',         
            'password' => bcrypt('admin'),
            'type' => '0', //admin             
        ]);

        User::create([
            'username' => 'kamranabrar90',    
            'email' => 'kamranabrar90@gmail.com', 
            'password' => bcrypt('12345678'),
            'type' => '1', //User
        ]);

        User::create([
            'username' => 'asad24188',    
            'email' => 'asad24188@gmail.com', 
            'password' => bcrypt('12345678'),
            'type' => '1', //User    
        ]);
    }
}
