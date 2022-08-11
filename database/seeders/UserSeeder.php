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
            'name' => 'ultraman',
            'email' => 'ultraman@123',
            'password' => bcrypt('12345678'),
            'role' => 'admin'
        ]);
    }
}
