<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Models\DoctorPatient;

class PatientRepository
{
  public function verifyPatient(int $id_paciente)
  {
    $query = Patient::where('id', $id_paciente)->first();

    return $query;
  }

  public function updatePatient(int $id_paciente, array $request)
  {
    return Patient::where('id', $id_paciente)->update($request);
  }

  public function storePatient(array $request)
  {
    return Patient::create($request);
  }
}
