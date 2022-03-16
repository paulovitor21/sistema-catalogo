<?php

    $host = "localhost";
    $user = "id18627799_root";
    $password = "Icetufam123*";
    $database = "id18627799_db_catalogo";

    $link = new mysqli($host, $user, $password, $database);
    //$link = new mysqli($host, $user, $password, $database);

    // verifica se a conexão com o banco de dados foi bem sucedida
    if ($link->connect_error) {
        // finaliza a conexao do sistema e informa o tipo de erro ocorrido.
        die($link->connect_error);
    }

