<?php

namespace App\Repositories;

use App\Models\Doctor;
use App\Models\DoctorPatient;

class DoctorRepository
{
  public function getAllDoctors(array $filters)
  {
    $query = Doctor::where($filters);

    return $query;
  }

  public function verifyDoctor(int $id_medico)
  {
    $query = Doctor::where('id', $id_medico);

    return $query->first();
  }

  public function addPatient(array $request)
  {
    return DoctorPatient::create($request);
  }

  public function getAllPatients(array $filters)
  {
    return DoctorPatient::where($filters);
  }

  public function storeDoctor(array $request)
  {
    return Doctor::create($request);
  }
}
