<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio KIS - Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/878415c25e.js" crossorigin="anonymous"></script>

    <!-- Estilos -->
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            padding-top: 60px;
            padding-bottom: 60px;
        }

        footer {
            text-align: center;
            padding: 1em;
            background-color: #f8f9fa;
            margin-top: auto;
        }
    </style>
</head>

<body>

    <script>
        function eliminar() {
            var respuesta = confirm("¿Estás seguro que deseas eliminar a este usuario?");
            return respuesta;
        }
    </script>

    <h1 class="text-center p-3 bg-info text-white">Desafío KIS</h1>
    <br>

    <div class="container-fluid row">

        <h3 class="text-center text-secondary">Listado de personas</h3>
        <br><br><br>

        <div class="col-8 p-10 m-auto">
            <!-- Formulario de filtrado -->
            <form method="POST" class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Filtro por nombre" name="filtro_nombre">
                    <button class="btn btn-primary btn-warning " type="submit">Filtrar</button>
                </div>
            </form>
            <?php
            include "conexion/conexion.php";
            include "funciones/eliminar_datos.php";
            ?>
        </div>

        <div class="col-8 p-10 m-auto table-responsive border border-warning" style="border-radius: 15px;">
            <!-- Tabla con datos ya registrados -->
            <?php
            include "conexion/conexion.php";
            include "funciones/registro.php";

            // Aplicacion del filtro por el nombre enviado
            $filtro_nombre = isset($_POST['filtro_nombre']) ? $_POST['filtro_nombre'] : '';
            $sql = $conexion->query(" select * from personas where nombre like '%$filtro_nombre%' ");
            ?>
            <table class="table">
                <thead class="bg-info">
                    <!-- Columnas con los tipos de datos -->
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Rut</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Fecha de Nacimiento</th>
                        <th scope="col">Correo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Conexion con la BD -->
                    <?php
                    while ($datos = $sql->fetch_object()) { ?>
                        <!-- Datos extraidos de la BD -->
                        <tr>
                            <td></td>
                            <td><?= $datos->nombre ?></td>
                            <td><?= $datos->apellido ?></td>
                            <td><?= $datos->rut ?>-<?= $datos->cv ?></td>
                            <td><?= $datos->sexo ?></td>
                            <td><?= $datos->telefono ?></td>
                            <td><?= $datos->direccion ?></td>
                            <td><?= $datos->fecha_nacimiento ?></td>
                            <td><?= $datos->correo_electronico ?></td>
                            <!-- Botones de editar y eliminar registros -->
                            <td>
                                <a href="modificar.php?id=<?= $datos->id ?>" class="btn btn-small btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a onclick="return eliminar()" href="index.php?id=<?= $datos->id ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <br>


    <footer class="text-center text-muted">
        <div class="container-fluid row">
            <br><br><br>
            <a href="formulario.php" class="btn btn-small btn-warning m-auto" style="max-width: 200px;">Añadir nuevo registro</a>
        </div>
        <br>
        <p>&copy; 2024 Desafío KIS. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>