<?php

namespace Database\Factories;

use App\Models\Type_filiere;
use Illuminate\Database\Eloquent\Factories\Factory;

class Type_filiereFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Type_filiere::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'intitule'=>$this->faker->randomElement(['industriel' ,'electric']),
        ];
    }
}
