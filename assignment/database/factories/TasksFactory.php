<?php

namespace Database\Factories;

use App\Models\Tasks;
use Illuminate\Database\Eloquent\Factories\Factory;

class TasksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tasks::class;

    function generateTaskName($color)
    {
        return "Paint using {$color}";
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->generateTaskName($this->faker->unique()->hexColor),
            'description' => $this->faker->sentence(),
            'point' => $this->faker->numberBetween(1,100),
        ];
    }
}
