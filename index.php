<?php

    if (isset($_GET["c"])) {
        $controlador = $_GET["c"];
        if (file_exists("controller/$controlador.php")) {
            include "controller/$controlador.php";
            if (isset($_GET["m"]) && is_callable($_GET["m"])) {
                $_GET["m"]();
            }
            else if (!isset($_GEt["m"]) && is_callable("index")) {
                index();
            }
            else {
                die("Não foi possível atender a solicitação.");
            }
        }
        else {
            die("Esse recurso não existe.");
        }
    }