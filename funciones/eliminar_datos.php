<?php

if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$conexion->query(" delete from personas where id=$id ");

    if ($sql==1) {
        echo '<div class="alert alert-success">Perfil eliminado correctamente!</div>';
    } else {
        echo '<div class="alert alert-danger">Error al eliminar el perfil</div>';
    }
    
}

?>