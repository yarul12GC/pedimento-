<?php
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $db = "pedimentocenca";
    $conexion = new mysqli($servidor, $usuario, $password, $db);

    if($conexion->connect_error){
        die("Conexion fallida: " . $conexion->connect_error);
    }
