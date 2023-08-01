<?php

namespace App\Services;

use App\Repositories\DoctorRepository;

class DoctorService
{
  protected $doctorRepository;

  public function __construct()
  {
    $this->doctorRepository = new DoctorRepository();
  }

  public function getAllDoctors(array $filters)
  {
    $doctorRepository = $this->doctorRepository;

    $qb = $doctorRepository->getAllDoctors($filters);

    return $qb->get();
  }

  public function verifyDoctor(int $id_medico)
  {
    $doctorRepository = $this->doctorRepository;

    return $doctorRepository->verifyDoctor($id_medico);
  }

  public function addPatient(array $request)
  {
    $doctorRepository = $this->doctorRepository;

    return $doctorRepository->addPatient($request);
  }

  public function getAllPatients(array $filters)
  {
    $doctorRepository = $this->doctorRepository;

    $qb = $doctorRepository->getAllPatients($filters);

    return $qb->get();
  }

  public function storeDoctor(array $request)
  {
    $doctorRepository = $this->doctorRepository;

    return $doctorRepository->storeDoctor($request);
  }
}
