<?php
    
    require_once 'model/categoria.php';

    function index() {
        $categorias = selecionarTodasCategorias();
        include 'view/listagem_categoria.php';
    }

    function adicionar() {
        include "view/formulario_categoria.php";
    }

    function salvar() {
        //var_dump($_POST);
        $dados = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nome = $dados['nome'];
        
        if (isset($_POST["id_categoria"]) && is_numeric($_POST["id_categoria"])) {
            $id = $_POST["id_categoria"];
            atualizarCategoria($nome, $id);
        }
        else {
            inserirCategoria($nome);
        }
        
        header("Location: index.php?c=categoria");
        
    
    }

    function excluir() {
        if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $id = $_GET["id"];
            excluirCategoria($id);            
        }
        header("Location: index.php?c=categoria"); // redireciona para a pagina categorias
    }

    function editar() {
        if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $id = $_GET["id"];
            $categoria = selecionarCategoriaId($id);
            include "view/formulario_categoria.php";
            
        }
    }