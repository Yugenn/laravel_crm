<?php

namespace Database\Factories;

use App\Models\Zip;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Zip::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('ja_JP');
        return [
            'name' => $faker->name(),
            'email' => $faker->email(),
            'postcode' => $faker->postcode(),
            'address' => $faker->address(),
            'phoneNumber' => $faker->phoneNumber(),
        ];
    }
}
