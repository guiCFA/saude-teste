<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Doctor;
use App\Models\City;

class DoctorFactory extends Factory
{
  protected $model = Doctor::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'nome'          => $this->faker->name,
      'especialidade' => $this->faker->jobTitle,
      'cidade_id'     => City::all()->random()->id,
      'deleted_at'    => $this->faker->optional($weight = 0.1)->dateTimeThisDecade(),
    ];
  }
}
