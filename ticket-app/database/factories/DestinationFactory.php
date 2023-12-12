<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;

class DestinationFactory extends Factory
{
    protected $model = Destination::class;

    public function definition(): array
    {
        $country = Country::has('cities')->get()->random();

        return [
            'name' => fake()->unique()->name(),
            'code' => fake()->unique()->postcode(),
            'city_id' => $country->cities()->get()->random()->first()->id,
        ];
    }
}
