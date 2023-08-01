<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\City;

class CityFactory extends Factory
{
  protected $model = City::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'nome'   => $this->faker->city,
      'estado' => $this->faker->state,
    ];
  }
}
