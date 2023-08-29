<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'test',
            'email' => 'test@test.test',
            'password' => 'test'
        ]);
        User::factory(10)->create();
    }
}
