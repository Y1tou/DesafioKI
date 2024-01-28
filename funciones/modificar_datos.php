<?php

error_reporting(0);
ini_set('display_errors', 0);

if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["rut"]) or ($_POST["dv"]) or ($_POST["sexo"]) or ($_POST["fnacimiento"])) {
        echo '<div class="alert alert-danger">Error al modificar datos!</div>';
    } else {
        if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["telefono"]) and !empty($_POST["direccion"]) and !empty($_POST["correo"])) {

            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $telefono = $_POST["telefono"];
            $direccion = $_POST["direccion"];
            $correo_electronico = $_POST["correo"];


            $sql = $conexion->query(" update personas set nombre='$nombre', apellido='$apellido', telefono='$telefono', direccion='$direccion', correo_electronico='$correo_electronico' where id=$id ");

            if ($sql == 1) {
                header("location:index.php");
            } else {
                echo '<div class="alert alert-danger">Error al modificar!</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Faltan datos!</div>';
        }
    }
};
?>
