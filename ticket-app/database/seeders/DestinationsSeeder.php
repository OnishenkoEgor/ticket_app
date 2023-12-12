<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;

class DestinationsSeeder extends Seeder
{
    public function run(): void
    {
        Destination::factory(30)->create();
    }
}
