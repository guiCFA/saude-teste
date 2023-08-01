<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\DoctorPatient;
use App\Models\Doctor;
use App\Models\Patient;

class DoctorPatientFactory extends Factory
{
  protected $model = DoctorPatient::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $medicoId   = Doctor::all()->random()->id;
    $pacienteId = Patient::all()->random()->id;

    return [
      'medico_id'    => $medicoId,
      'paciente_id'  => $pacienteId,
      'deleted_at'   => $this->faker->optional($weight = 0.1)->dateTimeThisDecade(),
    ];
  }
}
