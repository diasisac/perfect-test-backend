<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProdutoService;
use Illuminate\Support\Facades\Session;

class ProdutoController extends Controller
{

    protected $produtoService;

    public function __construct(
        ProdutoService $produtoService
        )
	{
        $this->produtoService = $produtoService;
    }

    public function index(){
        return view('crud_products');
    }

    public function cadastrar(Request $request){

        $this->produtoService->cadastrar($request);

        return redirect('/')->with('success', 'Produto cadastrado com sucesso!');   

    }

    public function exibir(Request $request){
        
        $produto = collect($this->produtoService->exibir($request));

        return view('crud_products')->with('produto', $produto['data'][0]);
    }

    public function editar(Request $request){
        
        $produto = $this->produtoService->editar($request);

        return redirect('/')->with('success', 'Produto alterado com sucesso!');   
    }

    public function excluir(Request $request)
    {
        try {
           $produto = $this->produtoService->excluir($request);
            return redirect('/')->with('success', 'Produto excluído com sucesso!');   
        } catch (\Exception $e) {
            return redirect('/')->with('danger',$e->getMessage());
        }
    }
}
