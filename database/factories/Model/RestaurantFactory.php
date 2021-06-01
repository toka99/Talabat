<?php

namespace Database\Factories\Model;

use App\Models\Model\Restaurant;
use App\Models\Model\User;
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
        $users = User::all()->pluck('id')->toArray();
        return [
            'vendor_id' => $this->faker->randomElement($users), 
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'logo' => $this->faker->word,
            'location' => $this->faker->text,
            'working_hours' => $this->faker->numberBetween(0,24),
            'minimum_order' => $this->faker->numberBetween(20,100),
            'delivery_fees' => $this->faker->numberBetween(15,50),
           


        ];
    }
}
