@extends('layout')

@section('content')
@if (\Session::has('success'))
<div style="display: flex; justify-content:center;" class="alert alert-success">
        {!! \Session::get('success') !!}
</div>
@endif

@if (\Session::has('danger'))
<div style="display: flex; justify-content:center;" class="alert alert-danger">
        {!! \Session::get('danger') !!}
</div>
@endif

    <h1>Dashboard de vendas</h1>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Tabela de vendas
                <a href='<?= url('vendas') ?>' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Nova venda</a></h5>
            <form>
                <div class="form-row align-items-center">
                    <div class="col-sm-5 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Clientes</div>
                            </div>
                              <select name="cliente" id="cliente" class="form-control">
                                <option value="" rel="">Selecione</option>
                              </select>
                        </div>
                    </div>
                    <div class="col-sm-6 my-1">
                        <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Período</div>
                            </div>
                            <input type="text" name="periodo" class="form-control date_range" id="inlineFormInputGroupUsername" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-sm-1 my-1">
                        <button type="submit" class="btn btn-primary" style='padding: 14.5px 16px;'>
                            <i class='fa fa-search'></i></button>
                    </div>
                </div>
            </form>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Produto
                    </th>
                    <th scope="col">
                        Data
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>
                @if (!empty($vendas))

                @foreach ( $vendas as $venda )
                <tr>
                    <td>
                        {{$venda['produto']}}
                    </td>
                    <td>
                        {{ implode('/', array_reverse(explode('-', $venda['data_venda'])))}}
                    </td>
                    <td>
                      R$ {{number_format($venda['preco'],2,",",".")}}
                    </td>
                    <td>
                        <a href='<?= url('venda/'.$venda['id']) ?>' class='btn btn-primary'>Editar</a>
                        <a href='<?= url('venda/excluir/'.$venda['id']) ?>' class='btn btn-danger'>X</a>
                    </td>
                </tr>
                @endforeach
                    
                @else
                <table>
                    <tr>
                        <div style="display:flex; justify-content: center;">
                        Nenhuma venda do cliente selecionado foi encontrado.
                        <div>
                    </tr>
                </table>        
                @endif
                
            </table>
        </div>
    </div>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Resultado de vendas</h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Status
                    </th>
                    <th scope="col">
                        Quantidade
                    </th>
                    <th scope="col">
                        Valor Total
                    </th>
                </tr>
                @if (!empty($vendas))
                
                @foreach ( $vendas as $venda )
                    <tr>
                        <td>
                            {{$venda['status_venda']}}
                        </td>
                        <td>
                            {{$venda['quantidade_produto']}}
                        </td>
                        <td>
                            R$ {{number_format($venda['preco']*$venda['quantidade_produto'],2,",",".")}}
                        </td>
                    </tr>
                @endforeach
                
                @else
                <table>
                    <tr>
                        <div style="display:flex; justify-content: center;">
                        Nenhuma venda do cliente selecionado foi encontrado.
                        <div>
                    </tr>
                </table>  
                @endif
                
            </table>
        </div>
    </div>

    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Produtos
                <a href='<?= url('produtos') ?>' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Novo produto</a></h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Nome
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>
                @if (!empty($produtos))
                @foreach ($produtos as $produto)
                    <tr>
                        <td>
                            {{$produto['nome']}}
                        </td>
                        <td>
                          R$ {{number_format($produto['preco'],2,",",".")}}
                        </td>
                        <td>
                            <a href='<?= url('produto/'.$produto['id']) ?>' class='btn btn-primary'>Editar</a>
                            <a href='<?= url('produto/excluir/'.$produto['id']) ?>' class='btn btn-danger'>X</a>
                        </td>
                    </tr>    
                @endforeach    
                @else
                <table>
                    <tr>
                        <div style="display:flex; justify-content: center;">
                        Nenhuma venda do cliente selecionado foi encontrado.
                        <div>
                    </tr>
                </table>  
                @endif                
            </table>
        </div>
    </div>

<script>    
$.ajax({
    url: 'http://localhost/perfect-test-backend/public/api/cliente',
    dataType: 'json',
    type: 'GET',
    success: function (data){
        data.data.map(data => {
            $('select#cliente').append('<option value="'+data.id+'" rel="'+data.nome+'"  >'+ data.nome +'</option>')
        });
    }
});
</script>
@endsection

