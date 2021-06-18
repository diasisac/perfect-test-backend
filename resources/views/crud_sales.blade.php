@extends('layout')

@section('content')
    <h1>Adicionar / Editar Venda</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="<?php echo !empty($venda) ? url('/venda/editar') : url('/venda/cadastrar') ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?php !empty($cliente['id']) ? $cliente['id'] : '' ?>">
                <h5>Informações do cliente</h5>
                <div class="form-group">
                    <label for="name">Nome do cliente</label>
                    <input type="text" class="form-control " id="name" name="nome" value="<?php echo !empty($cliente['nome']) ? $cliente['nome'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo !empty($cliente['email']) ? $cliente['email'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" placeholder="99999999999" name="cpf" value="<?php echo !empty($cliente['cpf']) ? $cliente['cpf'] : '' ?>">
                </div>
                <h5 class='mt-5'>Informações da venda</h5>
                <div class="form-group">
                    <label for="product">Produto</label>
                    <select name="produto" id="produto" class="form-control">
                        <option value="" rel="">Selecione</option>
                      </select>
                </div>
                <div class="form-group">
                    <label for="date">Data</label>
                    <input type="text" class="form-control single_date_picker" id="date" name="data_venda" value="">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantidade</label>
                    <input type="text" class="form-control" id="quantity" placeholder="1 a 10" name="quantidade_produto" value="<?php echo !empty($venda['quantidade_produto']) ? $venda['quantidade_produto'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="discount">Desconto</label>
                    <input type="text" class="form-control" id="discount" placeholder="100,00 ou menor" name="desconto" value="<?php echo !empty($venda['desconto']) ? $venda['desconto'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status_venda" class="form-control">
                        <option selected>Escolha...</option>
                        <option value="Aprovado" rel="">Aprovado</option>
                        <option value="Cancelado" rel="">Cancelado</option>
                        <option value="Devolvido" rel="">Devolvido</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
    <script>    
        $.ajax({
            url: 'http://localhost/perfect-test-backend/public/api/produto',
            dataType: 'json',
            type: 'GET',
            success: function (data){
                data.data.map(data => {
                    $('select#produto').append('<option value="'+data.id+'" rel="'+data.nome+'"  >'+ data.nome +'</option>')
                });
            }
        });
        </script>
@endsection
