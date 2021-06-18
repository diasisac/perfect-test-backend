<?php

namespace App\Services;

use App\Repositories\ProdutoRepository;

class ProdutoService
{
	public function __construct(ProdutoRepository $repository)
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

    public function exibir($request)
	{
		return $this->repository->show($request);
	}

	public function editar($request)
	{
		return $this->repository->update($request);
	}

	public function excluir($request)
	{
		return $this->repository->delete($request);
	}
}