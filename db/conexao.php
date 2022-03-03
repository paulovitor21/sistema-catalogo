<?php

    $host = "localhost";
    $user = "root";
    $password = "prog1278";
    $database = "db_prog_web";

    $link = new mysqli($host, $user, $password, $database);
    //$link = new mysqli($host, $user, $password, $database);

    // verifica se a conexão com o banco de dados foi bem sucedida
    if ($link->connect_error) {
        // finaliza a conexao do sistema e informa o tipo de erro ocorrido.
        die($link->connect_error);
    }

