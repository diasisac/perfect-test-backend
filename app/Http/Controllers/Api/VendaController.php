<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\VendaService;

class VendaController extends Controller
{
    protected $vendaService;

    public function __construct(VendaService $vendaService)
	{
		$this->vendaService = $vendaService;
    }

    public function index(Request $request){

        $vendas = $this->vendaService->listar($request);
        return response()->json($vendas);
    }
}