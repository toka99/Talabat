<?php

namespace Database\Factories\Model;

use App\Models\Model\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vendor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'id' => $this->faker->unique()->numberBetween(0,1000),
            'first_name_vendor' => $this->faker->word, 
            'last_name_vendor' => $this->faker->word, 
            'email' => $this->faker->unique()->safeEmail(),
            'password_vendor' => $this->faker->asciify('***************'),
        ];
    }
}
