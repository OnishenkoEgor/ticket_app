<?php

namespace Database\Seeders;

use App\Models\Country;

class CountrySeeder
{
    public function run(): void
    {
        Country::factory(10)->create();
    }
}
