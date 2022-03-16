<?php
    if(!defined("CONTROLADOR")) {
        die("Solicitção não atendida");
    }
    
    require_once 'util/controla_acesso.php';
    require_once 'model/usuario.php';

    function index() {
        $usuarios = selecionarTodosUsuarios();
        include 'view/listagem_usuario.php';
    }

    function adicionar() {
        include "view/formulario_usuario.php";
    }

    function salvar() {
        //var_dump($_POST);
        $dados = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nome = $dados['nome'];
        $nacionalidade = $dados['nacionalidade'];
        $login = $dados['login'];
        $senha = $dados['senha'];
        $confirma_senha = $dados['confirma_senha'];
        
        if (isset($_POST["id_usuario"]) && is_numeric($_POST["id_usuario"])) {
            $id = $_POST["id_usuario"];
            $erros_validacao = validarUsuario($nome, $nacionalidade, $login, $senha, $confirma_senha, "atualizar");
            mostrar_erros($erros_validacao, $dados);
            atualizarUsuario($nome, $nacionalidade, $login, $senha, $id);
        }
        else {
            $erros_validacao = validarUsuario($nome, $nacionalidade, $login, $senha, $confirma_senha, "salvar");
            mostrar_erros($erros_validacao, $dados);
            inserirUsuario($nome, $nacionalidade, $login, $senha);
        }
        
        header("Location: index.php?c=usuario");
        
    
    }

    function mostrar_erros($erros_validacao, $dados) {
        if (!empty($erros_validacao)) {
            $usuario = (object) $dados;
            include "view/formulario_usuario.php";
            die();
        }
    }

    function excluir() {
        if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $id = $_GET["id"];
            excluirUsuario($id);
        }
        header("Location: index.php?c=usuario"); // redireciona para a pagina de usuarios
    }

    function editar() {
        if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $id = $_GET["id"];
            $usuario = selecionarUsuarioId($id);
            include "view/formulario_usuario.php";
        }
    }