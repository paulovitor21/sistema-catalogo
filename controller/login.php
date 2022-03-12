<?php

    require_once 'model/usuario.php';

    function index() {
        include "./view/formulario_login.php";
    }

    function login() {
        $dados = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $usuario = selecionarUsuarioLoginSenha($dados["login"], $dados["senha"]);

        if (is_null($usuario)) {
            $erros = "Usuário ou senha inválido!";
            include "./view/formulario_login.php";
        }else {
            echo "Login realizado com sucesso!";
            var_dump($usuario);
        }
    }