<?php

namespace Database\Factories\Model;

use App\Models\Model\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'id' => $this->faker->unique()->numberBetween(0,1000),
            'first_name' => $this->faker->name, 
            'last_name' => $this->faker->name, 
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => $this->faker->asciify('***************'),
            'gender' => $this->faker->randomElement(['Male' ,'Female']),
            'date_of_birth' => $this->faker->dateTimeBetween('1930-01-01', '2021-12-31'),
            'account_status' => $this->faker->randomElement(['Active' ,'Banned']),
            'remember_token' => Str::random(10),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

