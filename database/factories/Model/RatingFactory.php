<?php

namespace Database\Factories\Model;

use App\Models\Model\Rating;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Model\Restaurant;
class RatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rating::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $restaurants = Restaurant::all()->pluck('id')->toArray();
        return [
        //     'restaurant_id' => function(){
        //         return Restaurant::all()->random();
        //     },
            'restaurant_id' => $this->faker->randomElement($restaurants), 
            'score' => $this->faker->numberBetween(0,5),
            'review' => $this->faker->paragraph,
        ];
    }
}
