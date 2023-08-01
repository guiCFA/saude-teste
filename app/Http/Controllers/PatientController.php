<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Services\PatientService;

use Exception;

class PatientController extends Controller
{
  protected $patientService;

  public function __construct()
  {
    $this->patientService = new PatientService();
  }

  public function updatePatient($id_paciente, Request $request)
  {
    try
    {
      $validator = Validator::make($request->all(), [
                                                      'nome'    => 'sometimes',
                                                      'celular' => 'sometimes',
                                                    ]);


      if ($validator->fails()) return response()->json(['error' => true, 'message' => $validator->errors()->first()], 400);

      $dataArray =  [
                      'nome'    => $request->nome,
                      'celular' => $request->celular
                    ];

      $this->patientService->updatePatient($id_paciente, $dataArray);

      return response()->json([
        'error' => false,
        'data'  => 'Paciente atualizado'
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
                                                      'nome'    => 'required',
                                                      'celular' => 'required',
                                                      'cpf'     => 'required'
                                                    ]);


      if ($validator->fails()) return response()->json(['error' => true, 'message' => $validator->errors()->first()], 400);

      $data = [
                'nome'    => $request->nome,
                'celular' => $request->celular,
                'cpf'     => $request->celular
              ];

      $this->patientService->storePatient($data);

      return response()->json([
        'error' => false,
        'data'  => 'Paciente cadastrado'
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
