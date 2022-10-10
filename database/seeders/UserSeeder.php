<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seed admin
        $admin = User::create([
            'name' => 'zero',
            'email' => 'zero@gmail.com',
            'password' => bcrypt('asdf;lkj')
        ]);
        $admin->assignRole('admin');

        //seed user
        $user = User::create([
            'name' => 'raja',
            'email' => 'raja@gmail.com',
            'password' => bcrypt('asdf;lkj')
        ]);
        $user->assignRole('user');

        //seed seller
        $seller = User::create([
            'name' => 'dewa',
            'email' => 'dewa@gmail.com',
            'password' => bcrypt('asdf;lkj')
        ]);
        $seller->assignRole('seller');
    }
}
