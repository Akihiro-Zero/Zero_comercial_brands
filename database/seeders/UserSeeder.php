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
            'password' => bcrypt('asdf;lkj'),
            'unique_id' => '177013'
        ]);
        $admin->assignRole('admin');

        //seed seller
        $seller = User::create([
            'name' => 'dewa',
            'email' => 'dewa@gmail.com',
            'password' => bcrypt('asdf;lkj'),
            'unique_id' => '279261'

        ]);
        $seller->assignRole('seller');

        //seed user
        $user = User::create([
            'name' => 'raja',
            'email' => 'raja@gmail.com',
            'password' => bcrypt('asdf;lkj'),
            'unique_id' => '24434'
        ]);
        $user->assignRole('user');
    }
}
