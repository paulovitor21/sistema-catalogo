<?php
    if(!defined("CONTROLADOR")) {
        die("Solicitção não atendida");
    }
    
    require_once 'model/usuario.php';

    function index() {
        include "./view/formulario_login.php";
    }

    function login() {
        $dados = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $usuario = selecionarUsuarioLoginSenha($dados["login"], md5($dados["senha"]));

        if (is_null($usuario)) {
            $erros = "Usuário ou senha inválido!";
            include "./view/formulario_login.php";
        }else {
            session_start();
            $_SESSION['usuario'] = $usuario;
            header("Location: index.php?c=produto");
        }
    }

    function logout() {
        session_start();
        unset($_SESSION['usuario']);
        session_destroy();
        header("Location: index.php?c=login");
    }