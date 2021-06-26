<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrInsert([
            'name' => 'admin',
            'role_id' => '1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        User::updateOrInsert([
            'name' => 'user',
            'role_id' => '2',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
