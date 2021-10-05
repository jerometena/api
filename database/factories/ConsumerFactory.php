<?php

namespace Database\Factories;

use App\Models\Consumer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsumerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Consumer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name(),
            'age' => $this->faker->numberBetween(15, 30),
            'contact_num' => $this->faker->phoneNumber(),
            'meter_num' => $this->faker->unique()->numberBetween(0, 10)
        ];
    }
}
