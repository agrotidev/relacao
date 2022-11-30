<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiMessage;
use App\Http\Controllers\Controller;
use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    private $departamento;

    public function __construct(Departamento $departamento)
    {
        $this->departamento = $departamento;
    }

    public function index()
    {
        $departamento = $this->departamento->paginate('10');

        return response()->json($departamento, 200);
    }

    public function show($id)
    {
        try {
            $departamento = $this->departamento->with('setores')->findOrFail($id);

            return response()->json([
                'data' =>  $departamento
            ], 200);
        } catch (\Exception $e) {
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
