<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Speeden\Models\User;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'     => rand(1,8),
            'name'        => $this->faker->words(3,true),
            'address'     => $this->faker->address,
            'locality'    => $this->faker->word,
            'state'       => $this->faker->word,
            'country'     => $this->faker->country,
            'postal_code' => $this->faker->postcode
        ];
    }
}
