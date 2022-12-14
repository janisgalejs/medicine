<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed super admin
        User::create([
            'name' => 'Jānis Galejs',
            'email' => 'janisgalejs@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$51oD5jU9XpLcHciNVVCUyemtyKpqIh/9uDVWWb.tTxe3v7KUnkRhO', // Soundline0123
            'status' => 1
        ]);

        // seed fake users
        User::factory()->count(10)->create();
    }
}
