<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiMessage;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $user = $this->user->paginate('10');

        return response()->json($user, 200);
    }

    public function show($id)
    {
        try {
            $user = $this->user->with('setor')->findOrFail($id);

            return response()->json([
                'data' =>  $user
            ], 200);
        } catch (\Exception $e) {
            $message = new ApiMessage($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
