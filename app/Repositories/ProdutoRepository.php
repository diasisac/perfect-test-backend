<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Produto;
use Exception;

class ProdutoRepository
{
  protected $repository;

  public function __construct(Produto $repository)
  {
    $this->repository = $repository;
  }

  public function all($request)
  {
    $produto = Produto::query();  

    $produtos = $produto->paginate('10');

    return $produtos;
  }    

  public function store($request)
  {
      $produto = Produto::create([
        'nome' => $request->nome,
        'descricao' => $request->descricao,
        'preco' => $request->preco,
    ]);
  }    

  public function show($request)
  {

    $produto = Produto::where('id', $request->id);

    $produto = $produto->paginate('10');

    return $produto;
  }

  public function update($request)
  {
      $produto = Produto::where([
        'id' => $request->id
    ])->update([
      'nome' => $request->nome,
      'descricao' => $request->descricao,
      'preco' => $request->preco,
    ]
    );
  }

  public function delete($request)
  {
     $venda_produto = DB::table('vendas')
      ->Join('produtos','produtos.id','=','vendas.fk_produto')
      ->select('produtos.id')
      ->get();

      if(sizeof($venda_produto) > 0){
        throw new Exception('Falha ao excluir produto, uma venda está vinculada a esse produto!');
      }

      if($this->show($request)){
        DB::table('produtos')->where('id', '=', $request->id)->delete();
      }
      
  }
}