<?php

namespace App\Repositories;

use App\Models\Venda;
use App\Repositories\ClienteRepository;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;

class VendaRepository
{
  protected $repository;
  protected $cliente;

  public function __construct(
    Venda $repository,
    ClienteRepository $cliente
    )
  {
    $this->repository = $repository;
    $this->cliente = $cliente;
  }

  public function all($request)
  {
      $venda = DB::table('vendas')
      ->Join('produtos','produtos.id','=','vendas.fk_produto')
      ->select('vendas.id','produtos.nome as produto','produtos.preco','vendas.data_venda','vendas.status_venda','vendas.quantidade_produto');
      

    if ($request->has('cliente')  && !empty($request->cliente)) {
      $venda->where('fk_cliente', $request->cliente);
    }

    if ($request->has('periodo')  && !empty($request->periodo)) {
      
      $periodo = explode(" - ",$request->periodo);
      $data_inicio = Helper::dateEmMysql($periodo[0]);
      $data_fim = Helper::dateEmMysql($periodo[1]);

      $venda->whereBetween('data_venda', [$data_inicio,$data_fim]);
    }

    $venda = $venda->paginate('10');

    return $venda;
  }    

  public function store($request)
  {
    $fk_cliente = $this->cliente->store($request);
      
      $venda = Venda::create([
        'data_venda' => Helper::dateEmMysql($request->data_venda),
        'quantidade_produto' => $request->quantidade_produto,
        'desconto' => $request->desconto,
        'status_venda' => $request->status_venda,
        'fk_cliente' => $fk_cliente,
        'fk_produto' => $request->produto
    ]);
  }   

  
  public function show($request)
  {

    $venda = Venda::where('id', $request->id);

    $venda = $venda->paginate('10');

    return $venda;
  }

  public function update($request)
  {
      $venda = Venda::where([
        'id' => $request->id
    ])->update([
      'data_venda' => Helper::dateEmMysql($request->data_venda),
      'quantidade_produto' => $request->quantidade_produto,
      'desconto' => $request->desconto,
      'status_venda' => $request->status_venda,  
    ]
    );
  }

  public function delete($request)
  {

    $venda_produto = DB::table('clientes')
      ->Join('vendas','clientes.id','=','vendas.fk_cliente')
      ->select('clientes.id')
      ->where('clientes.id',$request->id)
      ->get();

      DB::table('vendas')->where('id', '=', $request->id)->delete();
      DB::table('clientes')->where('id', '=', $venda_produto[0]->id)->delete();

  }

}

