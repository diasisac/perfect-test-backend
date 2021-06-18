<?php

namespace App\Services;

use App\Repositories\ClienteRepository;

class ClienteService
{
	public function __construct(ClienteRepository $repository)
	{
		$this->repository = $repository;
	}

	public function listar($request)
	{
		return $this->repository->all($request);
	}

	public function cadastrar($request)
	{
		return $this->repository->store($request);
	}

	
	public function editar($request)
	{
		return $this->repository->update($request);
	}

	public function exibirClientePorVenda($request)
	{
		return $this->repository->customerBySale($request);
	}

	public function excluir($request)
	{
		return $this->repository->delete($request);
	}
}