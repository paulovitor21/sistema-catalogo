<?php
    
    
    require_once 'model/produto.php';
    require_once 'model/categoria.php';
    

    function index() {
        $produtos = selecionarTodosProdutos();
        $categorias = selecionarTodasCategorias();
        include 'view/produtos_cards.php';
    }

    function categoria() {
        if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $id = $_GET["id"];
            $produtos = selecionarTodosProdutosCategoria($id);
            $categorias = selecionarTodasCategorias();
            include 'view/produtos_cards.php';
        }
    }

    