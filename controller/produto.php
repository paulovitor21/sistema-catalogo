<?php
    
    require_once 'model/produto.php';
    require_once 'model/categoria.php';

    function index() {
        $produtos = selecionarTodosProdutos();
        include 'view/listagem_produto.php';
    }

    function adicionar() {
        $categorias = selecionarTodasCategorias();
        include "view/formulario_produto.php";
    }

    function salvar() {
        $dados = filter_input(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nome = $dados['nome'];
        $descricao = $dados['descricao'];
        $marca = $dados['marca'];
        $preco = $dados['preco'];
        $categoria = $dados['categoria'];
        inserirProduto($nome, $descricao, $marca, $preco, "semfoto", $categoria);
        header("Location: index.php?c=produto");
    }
