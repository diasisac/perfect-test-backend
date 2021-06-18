<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ClienteService;

class ClienteController extends Controller
{
    protected $clienteService;

    public function __construct(ClienteService $clienteService)
	{
		$this->clienteService = $clienteService;
    }

    public function index(Request $request){

        $clientes = $this->clienteService->listar($request);
        return response()->json($clientes);
    }
}