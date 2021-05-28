<?php

namespace Database\Factories\Model;

use App\Models\Model\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
class RestaurantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'logo' => $this->faker->word,
            'location' => $this->faker->text,
            'working_hours' => $this->faker->numberBetween(0,24),
            'minimum_order' => $this->faker->numberBetween(20,100),
            'delivery_fees' => $this->faker->numberBetween(15,50),
            'vendor_id' => $this->faker->unique()->numberBetween(0,1000),
            'first_name_vendor' => $this->faker->word, 
            'last_name_vendor' => $this->faker->word, 
            'password_vendor' => $this->faker->asciify('***************'),


        ];
    }
}
