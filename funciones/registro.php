<?php

error_reporting(0);
ini_set('display_errors', 0);

include "conexion/conexion.php";

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["rut"]) and !empty($_POST["sexo"]) and !empty($_POST["telefono"]) and !empty($_POST["direccion"]) and !empty($_POST["fnacimiento"]) and !empty($_POST["correo"])) {

        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $rut = $_POST["rut"];
        $cv = $_POST["cv"];
        $sexo = $_POST["sexo"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $fecha_nacimiento = $_POST["fnacimiento"];
        $correo_electronico = $_POST["correo"];

        $rut_copy = $rut;
        $largo = strlen($rut_copy);
        $contar = 2;

        while ($rut_copy <> 0) {
            $contardeauno = ($rut_copy % 10) * $contar;
            $acumulador = $acumulador + $contardeauno;
            $rut_copy = $rut_copy / 10;
            $contar = $contar + 1;
            if ($contar == 8) {
                $contar = 2;
            }
        }

        $division = $acumulador % 11;
        if ($division == 0) {
            $division = 11;
        }

        $dig = 11 - $division;
        $dig2 = strval($dig);
        if ($dig2 == 10) {
            $dig2 = "k";
        }

        if ($cv == $dig2) {
            $validacion = $conexion->query(" select * from personas where rut=$rut ");

            if ($validacion->num_rows > 0) {
                echo '<div class="alert alert-danger">El rut ingresado ya existe!</div>';
            } else {
                $sql = $conexion->query(" insert into personas(nombre, apellido, rut, cv, sexo, telefono, direccion, fecha_nacimiento, correo_electronico) values ('$nombre','$apellido','$rut','$cv','$sexo','$telefono',' $direccion','$fecha_nacimiento','$correo_electronico') ");
                if ($sql == 1) {
                    header("location:index.php");
                    echo '<div class="alert alert-succes">Usuario registrado correctamente!</div>';
                } else {
                    echo '<div class="alert alert-danger">Error al registrar!</div>';
                }
            }
        } else {
            echo '<div class="alert alert-danger">Error con el rut!</div>';
        }

    } else {
        echo '<div class="alert alert-danger">Faltan datos!</div>';
    }
};
