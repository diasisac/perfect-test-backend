<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VendaService;
use App\Services\ClienteService;

class VendaController extends Controller
{
    protected $vendaService;
    protected $clienteService;

    public function __construct(
        VendaService $vendaService,
        ClienteService $clienteService
        )
	{
        $this->vendaService = $vendaService;
        $this->clienteService = $clienteService;
    }
    
    public function index(){
        return view('crud_sales');
    }

    public function cadastrar(Request $request){

        $this->vendaService->cadastrar($request);

        return redirect('/')->with('success', 'Venda cadastrada com sucesso!');

    }

    public function exibir(Request $request){
        
        $venda = collect($this->vendaService->exibir($request));
        $cliente = json_decode(json_encode(collect($this->clienteService->exibirClientePorVenda($request))),true);

        return view('crud_sales')->with('venda', $venda['data'][0])->with('cliente', $cliente['data'][0]);
    }

    public function editar(Request $request){
        
        $venda = $this->vendaService->editar($request);
        $cliente = $this->clienteService->editar($request);

        return redirect('/')->with('success', 'Venda alterada com sucesso!');
    }

    public function excluir(Request $request)
    {
        $venda = $this->vendaService->excluir($request);
        $cliente = $this->clienteService->excluir($request);
        return redirect('/')->with('success', 'Venda excluída com sucesso!');
    }

}
