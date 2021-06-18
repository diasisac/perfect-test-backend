 # Você quer ser um desenvolvedor Backend na Perfectpay? 
 O desafio é desenvolver um sistema de vendas onde consiste um cadastro de produtos, o próprio cadastro de vendas onde será preenchido alguns dados também referente a cliente, uma dashboard onde estará
centralizado os dados de produtos, consulta de vendas e um relatório simplificado de vendas.
 
 # Instruções
 - O foco principal do nosso teste é o backend. Para facilitar você poderá utilizar os blade.php que disponibilizamos no projeto.
 - Fique à vontade para usar bibliotecas/componentes externos
 - Seguir princípios **CLEAN CODE** 
 - Utilize boas práticas de programação
 - Utilize boas práticas de git
 - Documentar como rodar o projeto
 
 # Requisitos
 - O sistema deverá ser desenvolvido utilizando a linguagem PHP no framework Laravel.
 - Você deve criar um CRUD que permita cadastrar as seguintes informações:
 	- **Produto**: Nome, Descrição e Preço.
 	- **Venda**: Produto,Data da venda, Quantidade do produto, Desconto, Status da venda.
	- **Cliente**: Nome, Email, CPF.
 - Salvar as informações necessárias em um banco de dados (relacional) de preferência MySql.
 - Exibir todos os dados na dashboard conforme exemplo deixado na blade.php.

 
 # Opcionais
 - Testes automatizados com informação da cobertura de testes
 - Upload de imagem no cadastro de produtos
 
 # O que será avaliado
 - Estrutura e organização do código e dos arquivos
 - Qualidade
 - Enfim, tudo será observado e levado em conta
 
 # Como iniciar o desenvolvimento
 - Fork esse repositório na sua conta do GitHub.
 - Crie uma branch com o nome desafio
 
 Qualquer dúvida sobre o teste, fique a vontade para entrar em contato conosco.

# Parte do desenvolvedor
 
<p><h3 id="markdown-header-descricao-challenge-backend-mobile-saude-2020-2">Instalação do projeto<g-emoji class="g-emoji" alias="wrench" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f527.png"></g-emoji></p></h3></p>

<ol>
<li>Realizar a instalação de um servidor web WAMP ou XAMPP, se preferir pode ser utilizado o próprio servidor do PHP.</li>
<li>Clonar este projeto local</li>
<li>Após a clonagem do repositório, é necessário instalar as dependências do projeto e para isso podemos prosseguir com comando <code>composer install</code> dentro do diretório do projeto EXEMPLO: <code>C:\xampp\htdocs\perfect-test-backend</code></li>
<li>Com a instalação das depêndencias concluída podemos acessar a aplicação com a seguinte url</li> <code>http://localhost/perfect-test-backend/public/</code>
</ol>

<p><h3 id="markdown-header-descricao-challenge-backend-mobile-saude-2020-2">Configurações do banco<g-emoji class="g-emoji" alias="wrench" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f527.png">🔧</g-emoji></p></h3></p>
<ul>
    <li>
        DATABASE=perfectpey 
    </li>
    <li>
        USERNAME=root 
    </li>
    <li>
        Charset=utf8mb4 
    </li>
    <li>
        Collation=utf8mb4_general_ci 
    </li>  
 </ul>

<p><h3 id="markdown-header-descricao-challenge-backend-mobile-saude-2020-2">Regras da aplicação<g-emoji class="g-emoji" alias="warning" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/26a0.png">⚠️</g-emoji></p></h3>
<ul>
<li>A listagem das vendas é realizada por padrão com filtros opcionais por cliente e data de venda, se não tiver cliente selecionado será retornada todas as datas</li>
<li>Para os produtos não são utilizados filtros</li>
<li>Para excluir um produto vinculado a uma venda é necessário excluir uma venda  antes</li>
<li>O cliente é cadastrado, editado e excluído junto com a exclusão de vendas</li>
</ul>
