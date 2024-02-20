<?php session_start(); 
include_once "conexion.php";
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css"> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<form class="registro" action="" method="post">
<div><label>Usuario:</label> <input type="text" name="usuario"></div>
<div><label>Clave:</label> <input type="password" name="password"></div>
<div><label>Repetir Clave:</label> <input type="password" name="repassword"></div>
<div><input class="boton" type="submit" name="enviar" value="Registrar"></div>
</form>

<?php

if (isset($_POST['enviar'])) {
    if ($_POST['usuario'] == '' or $_POST['password'] == '' or $_POST['repassword'] == '') {
        echo "<script>
                Swal.fire({
                    title: 'Por favor llene todos los campos.',
                    text: 'Presiona OK para intentarlo de nuevo.',
                    icon: 'info',
                }).then(function() {
                    window.location.href = 'index.php';
                });
              </script>";
    } else {
        // Conexión a la base de datos (actualiza con tus credenciales)
        $mysqli = new mysqli('localhost', 'root', '', 'login_bd');

        // Verificar la conexión
        if ($mysqli->connect_error) {
            die('Error de conexión: ' . $mysqli->connect_error);
        }

        // Consulta para verificar si el usuario ya existe
        $usuario = $mysqli->real_escape_string($_POST['usuario']);
        $query = "SELECT * FROM login2_tb WHERE usuario = '$usuario'";
        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
            echo "<script>
                Swal.fire({
                    title: 'Este usuario ya se ha registrado anteriormente.',
                    text: 'Presiona OK para intentarlo de nuevo.',
                    icon: 'info',
                }).then(function() {
                    window.location.href = 'index.php';
                });
              </script>";
        } else {
            // Verificar si las contraseñas coinciden
            if ($_POST['password'] == $_POST['repassword']) {
                $usuario = $mysqli->real_escape_string($_POST['usuario']);
                $password = $mysqli->real_escape_string($_POST['password']);

                // Insertar nuevo usuario
                $insertQuery = "INSERT INTO login2_tb (usuario, password) VALUES ('$usuario', '$password')";
                if ($mysqli->query($insertQuery)) {
                    echo "<script>
                Swal.fire({
                    title: '¡Usuario registrado exitosamente!',
                    text: 'Presiona OK para ingresar.',
                    icon: 'success',
                }).then(function() {
                    window.location.href = 'login_princ.php';
                });
              </script>";
                    header('Location: login_princ.php');
                    exit();
                } else {
                    echo "<script>
                Swal.fire({
                    title: 'Error al registrar.',
                    text: 'Por favor, intenta de nuevo.',
                    icon: 'error'
                }).then(function() {
                    window.location.href = 'contact-form.html';
                });
              </script>" . $mysqli->error;
                }
            } else {
                echo 'Las claves no son iguales, intente nuevamente.';
            }
        }

        // Cerrar la conexión
        $mysqli->close();
    }
}
?>


</body>
</html>
