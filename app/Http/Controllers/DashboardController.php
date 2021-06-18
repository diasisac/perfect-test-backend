<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClienteService;
use App\Services\ProdutoService;
use App\Services\VendaService;


class DashboardController extends Controller
{
    protected $clienteService;
    protected $produtoService;
    protected $vendaService;

	public function __construct(
        ClienteService $clienteService,
        ProdutoService $produtoService,
        VendaService $vendaService
        )
	{
		$this->clienteService = $clienteService;
        $this->produtoService = $produtoService;
        $this->vendaService = $vendaService; 
    }

    public function index(Request $request)
    {
        $clientes = collect($this->clienteService->listar($request));
        
        $produtos = collect($this->produtoService->listar($request));
        
        $vendas =json_decode(json_encode(collect($this->vendaService->listar($request))), true);

        return view('dashboard')->with('clientes', $clientes['data'])->with( 'produtos',$produtos['data'])->with('vendas',$vendas['data']);
    }

}
