<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
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
    </script>

    <h1 class="text-center p-3 bg-info text-white">Desafio KIS</h1>

    <div class="container-fluid row">
        <!-- Formulario de datos de la Persona -->
        <form class="col-md-4 col-12 p-3 m-auto" method="POST">
            <h3 class="text-center text-secondary">Formulario de registro</h3>
            <?php
            include "conexion/conexion.php";
            include "funciones/registro.php";
            ?>
            <!-- Nombre -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>

            <!-- Apellido -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" required>
            </div>

            <!-- Rut y DV -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Rut</label>
                <div class="d-flex">
                    <input type="text" class="form-control me-1" style="width: 70%;" name="rut" maxlength="8" required>
                    <span class="align-self-center">- </span>
                    <input type="text" class="form-control" style="width: 30%;" name="cv" maxlength="1" required>
                </div>
                <p class="text-center">Ingrese su rut sin puntos, y si su codigo verificador es "k" remplace por un 0</p>
            </div>

            <!-- Sexo -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Sexo</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1" value="M">
                    <label class="form-check-label" for="inlineRadio1">M</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2" value="F" required>
                    <label class="form-check-label" for="inlineRadio2">F</label>
                </div>
            </div>

            <!-- Telefono -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Telefono</label>
                <input type="number" class="form-control" name="telefono" required>
            </div>

            <!-- Direccion -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Direccion</label>
                <input type="text" class="form-control" name="direccion" required>
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fnacimiento" required>
            </div>

            <!-- Correo Electronico -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" name="correo" required>
            </div>

            <div class="text-center">
                <br>
                <button type="submit" class="btn btn-warning" name="btnregistrar" value="ok">Registrar</button>
            </div>

        </form>

    </div>

    <footer class="text-center text-muted">
        <p>&copy; 2024 Desafío KIS. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>