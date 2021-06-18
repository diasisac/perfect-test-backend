@extends('layout')

@section('content')
    <h1>Adicionar / Editar Produto</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="<?php echo !empty($produto) ? url('/produto/editar') : url('/produto/cadastrar') ?>" method="POST">
                <?= csrf_field(); ?>
                <input name="id" value="<?php echo !empty($produto['id']) ? $produto['id'] : '' ?>" type="hidden">
                <div class="form-group">
                    <label for="name">Nome do produto</label>
                    <input type="text" class="form-control " id="name" name="nome" value="<?php echo !empty($produto['nome']) ? $produto['nome'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea type="text" rows='5' class="form-control" id="description" name="descricao" ><?php echo !empty($produto['descricao']) ? $produto['descricao'] : '' ?></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input type="text" class="form-control" id="price" placeholder="100,00 ou maior" name="preco" value="<?php echo !empty($produto['preco']) ? $produto['preco'] : '' ?>">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
