<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProdutoService;

class ProdutoController extends Controller
{
    protected $produtoService;

    public function __construct(ProdutoService $produtoService)
	{
		$this->produtoService = $produtoService;
    }

    public function index(Request $request){

        $produtos = $this->produtoService->listar($request);
        return response()->json($produtos);
    }

    public function exibir(Request $request){

        $produtos = $this->produtoService->exibir($request);
        return response()->json($produtos);
    }
}