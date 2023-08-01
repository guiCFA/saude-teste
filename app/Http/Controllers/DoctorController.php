<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DoctorAddPatient;
use Validator;

use App\Services\DoctorService;
use App\Services\PatientService;

use App\Http\Resources\DoctorResource;
use Exception;

class DoctorController extends Controller
{
  protected $doctorService, $patientService;

  public function __construct()
  {
    $this->doctorService  = new DoctorService();
    $this->patientService = new PatientService();
  }

  public function index()
  {
    try
    {
      $filters = ['deleted_at' => null];

      $doctors = $this->doctorService->getAllDoctors($filters);
      return DoctorResource::collection($doctors);
    }
    catch(Exception $e)
    {
      return response()->json([
        'error' => true,
        'data' => $e
      ]);
    }
  }

  public function addPatient($id_medico, Request $request)
  {
    try
    {
      $validator = Validator::make($request->all(), [
                                                      'medico_id'   => 'required|int',
                                                      'paciente_id' => 'required|int'
                                                    ]);


      if ($validator->fails()) return response()->json(['error' => true, 'message' => $validator->errors()->first()], 400);

      $verifyDoctor  = $this->doctorService->verifyDoctor($id_medico);
      $verifyPatient = $this->patientService->verifyPatient($request->paciente_id);

      if($verifyDoctor->deleted_at != null || $verifyPatient->deleted_at != null)
      {
        return response()->json([
          'error' => true,
          'data'  => 'Não foi possivel vincular o paciente ao médico'
        ]);
      }

      $dataArray = ['medico' => $verifyDoctor, 'paciente' => $verifyPatient];

      $this->doctorService->addPatient(['medico_id' => $id_medico, 'paciente_id' =>$request->paciente_id]);

      return response()->json([
        'error' => false,
        'data'  => $dataArray
      ]);
    }
    catch(Exception $e)
    {
      return response()->json([
        'error' => true,
        'data' => $e
      ]);
    }
  }

  public function getAllPatientsByDoctor($id_medico)
  {
    try
    {
      $patients = $this->doctorService->getAllPatients(['medico_id' => $id_medico, 'deleted_at' => null]);

      $arr = collect([]);
      foreach($patients as $value)
      {
        $patient = $this->patientService->verifyPatient($value->paciente_id);

        $arr->push($patient);
      }

      return response()->json([
        'error' => false,
        'data'  => $arr
      ]);
    }
    catch(Exception $e)
    {
      return response()->json([
        'error' => true,
        'data' => $e
      ]);
    }
  }

  public function store(Request $request)
  {
    try
    {
      $validator = Validator::make($request->all(), [
                                                      'nome'          => 'required',
                                                      'especialidade' => 'required',
                                                      'cidade_id'     => 'required'
                                                    ]);


      if ($validator->fails()) return response()->json(['error' => true, 'message' => $validator->errors()->first()], 400);

      $data = [
                'nome'          => $request->nome,
                'especialidade' => $request->especialidade,
                'cidade_id'     => $request->cidade_id
              ];

      $this->doctorService->storeDoctor($data);

      return response()->json([
        'error' => false,
        'data'  => 'Médico cadastrado'
      ]);
    }
    catch(Exception $e)
    {
      return response()->json([
        'error' => true,
        'data' => $e
      ]);
    }
  }
}
