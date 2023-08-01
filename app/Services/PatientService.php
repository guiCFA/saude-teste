<?php

namespace App\Services;

use App\Repositories\PatientRepository;

class PatientService
{
  protected $patientRepository;

  public function __construct()
  {
    $this->patientRepository = new PatientRepository();
  }

  public function verifyPatient(int $id_paciente)
  {
    $patientRepository = $this->patientRepository;

    return $patientRepository->verifyPatient($id_paciente);
  }

  public function updatePatient(int $id_paciente, array $request)
  {
    $patientRepository = $this->patientRepository;

    return $patientRepository->updatePatient($id_paciente, $request);
  }

  public function storePatient(array $request)
  {
    $patientRepository = $this->patientRepository;

    return $patientRepository->storePatient($request);
  }
}
