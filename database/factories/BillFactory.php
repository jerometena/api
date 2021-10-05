<?php

namespace Database\Factories;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bill::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween(0, 5000),
            'paid' => $this->faker->numberBetween(0, 5000),
            'rate' => $this->faker->numberBetween(0, 100),
            'status' => $this->faker->randomElement(['paid', 'unpaid']),
            'reading_date' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'disconnection_date' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'due_date' => $this->faker->dateTimeBetween('now', '+7 days'),
            'image' => $this->faker->imageUrl(640, 480),
            'consumer_id' => $this->faker->unique()->numberBetween(0, 10),
            'user_id' => 1,
            'user_name' => $this->faker->name()
        ];
    }
}
