<?php

namespace Database\Factories;

use App\Models\Solutions;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolutionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Solutions::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'submit' => $this->faker->date(),
            'answer' => $this->faker->text(),
            'evaluated' => $this->faker->boolean(),
        ];
    }
}
