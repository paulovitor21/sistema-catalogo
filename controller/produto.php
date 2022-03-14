<?php
    
    require_once 'util/controla_acesso.php';
    require_once 'model/produto.php';
    require_once 'model/categoria.php';
    require_once 'util/upload.php';

    function index() {
        $produtos = selecionarTodosProdutos();
        include 'view/listagem_produto.php';
    }

    function adicionar() {
        $categorias = selecionarTodasCategorias();
        include "view/formulario_produto.php";
    }

    function salvar() {
        //var_dump($_POST);
        $dados = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nome = $dados['nome'];
        $descricao = $dados['descricao'];
        $marca = $dados['marca'];
        $preco = $dados['preco'];
        $categoria = $dados['categoria'];
        $nome_foto = $dados['name_foto'];
        $foto = upload("foto");
        if(!$foto) {
            $foto = $nome_foto;
        }
        
        if (isset($_POST["id"]) && is_numeric($_POST["id"])) {
            $id = $_POST["id"];
            atualizarProduto($nome, $descricao, $marca, $preco, $foto, $categoria, $id);
        }
        else {
            inserirProduto($nome, $descricao, $marca, $preco, $foto, $categoria);
        }
        
        header("Location: index.php?c=produto");
        
    
    }

    function excluir() {
        if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $id = $_GET["id"];
            excluirProduto($id);
        }
        header("Location: index.php?c=produto"); // redireciona para a pagina produtos
    }

    function editar() {
        if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $id = $_GET["id"];
            $categorias = selecionarTodasCategorias();
            $produto = selecionarProdutoId($id);
            include "view/formulario_produto.php";
        }
    }