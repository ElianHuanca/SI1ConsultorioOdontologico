<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paciente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ci'=>$this->faker->unique()->numberBetween('100','700'),
            'nombre'=>$this->faker->firstName(),
            'apellidoPaterno'=>$this->faker->lastName(),
           'apellidoMaterno'=>$this->faker->lastName(),
             'sexo'=>$this->faker->randomElement(['F','M']),
            'telefono'=>$this->faker->randomElement(['74940481','67711536','78176612']),
            'created_at'=>$this->faker->dateTimeBetween('-7 month','+1 month')
        ];
    }
}
