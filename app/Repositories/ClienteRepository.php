<?php

namespace App\Repositories;

use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class ClienteRepository
{
  protected $repository;

  public function __construct(Cliente $repository)
  {
    $this->repository = $repository;
  }

  public function all($request)
  {
    $cliente = Cliente::query();

    $clientes = $cliente->paginate('10');

    return $clientes;
  }    

  public function customerBySale($request)
  {
    $cliente = DB::table('clientes')
    ->Join('vendas','clientes.id','=','vendas.fk_cliente')
    ->where('clientes.id',$request->id)
    ->select('clientes.*');

    $clientes = $cliente->paginate('10');

    return $clientes;
  }    

  
  public function store($request)
  {
      $id = DB::table('clientes')->insertGetId([
        'nome' => $request->nome,
        'email' => $request->email,
        'cpf' => $request->cpf,
    ]);

    return $id;
  }    

  public function update($request)
  {
      $cliente = Cliente::where([
        'id' => $request->id
    ])->update([
      'nome' => $request->nome,
      'email' => $request->email,
      'cpf' => $request->cpf
    ]
    );
  }    

  public function delete($request)
  {
    DB::table('clientes')->where('id', '=', $request->id)->delete();     
  }
}