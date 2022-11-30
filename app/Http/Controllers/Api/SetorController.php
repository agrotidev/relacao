<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiMessage;
use App\Http\Controllers\Controller;
use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    private $setor;

    public function __construct(Setor $setor)
    {
        $this->setor = $setor;
    }

    public function index()
    {
        $setor = $this->setor->paginate('10');

        return response()->json($setor, 200);
    }

    public function show($id)
    {
        try {
            $setor = $this->setor->with(['departamento', 'usuarios'])->findOrFail($id);

            return response()->json([
                'data' =>  $setor
            ], 200);
        } catch (\Exception $e) {
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
