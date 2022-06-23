<?php

namespace Database\Factories;

use App\Models\Encadrant;
use App\Models\Type_filiere;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EncadrantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Encadrant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $idus=User::all()->where('role','encadrant')->pluck('id');
        $idEts=Type_filiere::all()->pluck('id');
        return [
            'user_id' => $this->faker->randomElement($idus),
            'type_filiere_id' => $this->faker->randomElement($idEts)
        
        ];
    }
}
