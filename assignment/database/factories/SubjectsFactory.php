<?php

namespace Database\Factories;

use App\Models\Subjects;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subjects::class;

    function generateSubjectCode($number)
    {
        $sss = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),0,3);
        return "IK-{$sss}{$number}";
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => substr($this->faker->unique()->sentence($nbWords = 2, $variableNbWords = true), 0, -1),
            'description' => $this->faker->optional($weight=0.8)->sentence(),
            'subject_code' => $this->generateSubjectCode($this->faker->unique()->numberBetween(100, 999)),
            'credit' => $this->faker->numberBetween(1,10),
        ];
    }
}
