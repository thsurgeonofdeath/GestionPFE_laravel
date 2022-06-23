<?php

namespace Database\Factories;

use App\Models\Etudiant;
use App\Models\Filiere;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Etudiant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       
        $idEts=User::all()->where('role','etudiant')->pluck('id');
        return [
            'user_id' => $this->faker->randomElement($idEts),
            'promotion' => 2018,
            'niveau' =>3,
            'cne' =>  $this->faker->regexify('[A-Z][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]'),
        ];
    }
}
