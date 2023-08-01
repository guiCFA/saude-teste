<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Patient;

class PatientFactory extends Factory
{
  protected $model = Patient::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $cpf = '';

    for($i = 0; $i < 9; $i++)
    {
      $cpf .= mt_rand(0, 9);
    }

    $dv1 = $dv2 = 0;

    for($i = 0, $x = 10; $i < 9; $i++, $x--)
    {
      $dv1 += $cpf[$i] * $x;
      $dv2 += $cpf[$i] * ($x + 1);
    }

    $dv1 = ($dv1 % 11) < 2 ? 0 : 11 - ($dv1 % 11);
    $dv2 += $dv1 * 2;
    $dv2 = ($dv2 % 11) < 2 ? 0 : 11 - ($dv2 % 11);

    $cpf .= $dv1 . $dv2;

    return [
      'nome'       => $this->faker->name,
      'celular'    => $this->faker->phoneNumber,
      'cpf'        => $cpf,
      'deleted_at' => $this->faker->optional($weight = 0.1)->dateTimeThisDecade(),
    ];
  }
}
