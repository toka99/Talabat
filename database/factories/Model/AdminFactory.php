<?php

namespace Database\Factories\Model;

use App\Models\Model\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

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
            'password' => $this->faker->asciify('***************'),
      
        ];
    }
}
