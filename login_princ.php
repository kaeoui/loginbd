<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://kit.fontawesome.com/7c416d91d9.js" crossorigin="anonymous"></script>

  <link rel="icon" type="image/png" href="img/fondo3.avif">
  <style>
    body {
      background-image: url(img/fondo7.avif);
      font-family: sans-serif;
      font-weight: bold;
    }

    .boton-inicio {
      background: linear-gradient(to right, #19248A, #373BC9);
      border: none;
      border-radius: 18px;
      width: 40%;
      height: 40px;
      color: white;
      font-weight: bold;
    }

    .boton-inicio:hover {
      background: linear-gradient(to left, #90cca9, #90cca9);
      color: white;
    }

    .bg-transparent-custom {
      background-color: rgba(183, 212, 254, 0.7);
    }

    .form-control {
      background-color: rgba(243, 248, 255, 0.5);
      border-radius: 18px;
      border: none;
      color: white;
      font-size: 17px;
    }

    .form-control:focus {
      background-color: rgba(195, 216, 245, 0.5);
      border-radius: 18px;
      border: none;
      color: white;
      font-size: 18px;

    }

   
  </style>

</head>

<body>


  <section class="vh-95">
    <div class="container py-3 h-100 mt-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-transparent-custom text-white" style="border-radius: 1rem; ">
            <div class="card-body p-5 text-center">

              <div class="mb-md-2 mt-md-2 pb-3">


                <form method="post" action="">
                  <?php /*
                  include("conexion_bd.php");
                  include("controlador.php"); */

                    ?>
                  <div class="form-outline form-white mb-4">

                    <label class="form-label" for="user">Usuario</label>
                    <input required type="text" name="usuario" class="form-control form-control-lg" />

                  </div>

                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="passw">Contraseña</label>
                    <input required type="password" name="password" class="form-control form-control-lg" />
                  </div>

                  <p class="small mb-3 pb-lg-2"><a class="text-white-50" href="#!">Olvidó la contraseña?</a></p>

                  <input class="boton-inicio" name="boton-inicio" type="submit" value="Iniciar Sesión">

                  <?php


                  $mysqli = new mysqli('localhost', 'root', '', 'login_bd');

                  if (isset($_POST['boton-inicio'])) {
                  if ($_POST['usuario'] == '' or $_POST['password'] == '') {
                  echo 'Por favor, ingrese usuario y contraseña.';
                  } else {
                  $usuario = $mysqli->real_escape_string($_POST['usuario']);
                  $password = $mysqli->real_escape_string($_POST['password']);

                  // Consulta para verificar las credenciales del usuario
                  $query = "SELECT * FROM login2_tb WHERE usuario = '$usuario' AND password = '$password'";
                  $result = $mysqli->query($query);

                  if ($result->num_rows > 0) {
                  // Inicio de sesión exitoso, establecer la sesión
                  session_start();

                  // Obtener información del usuario (puedes ajustar esto según tu esquema de base de datos)
                  $usuarioData = $result->fetch_assoc();

                  // Almacena información relevante en la sesión
                  $_SESSION['idlogin_tb'] = $usuarioData['idlogin_tb'];
                  $_SESSION['usuario'] = $usuarioData['usuario'];

                  // Redirigir a la página principal (o a la que desees)
                  header('Location: contact-form.html');
                  exit();
                  } else {
                  echo "<script>
                Swal.fire({
                    title: 'Credenciales incorrectas. Intente nuevamente.',
                    text: 'Presiona OK para intentarlo de nuevo.',
                    icon: 'info',
                }).then(function() {
                    window.location.href = 'login_princ.php';
                });
              </script>";
                  }
                  }
                  }

                  ?>


                </form>
                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                  <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                  <a href="https://github.com/kaeoui" class="text-white"><i class="fab fa-github fa-lg"></i></a>
                </div>

                <br> </br>
                <p class="small mb-3 pb-lg-2"><a class="text-white" href="#!" onclick="abrirOtraPagina()" >Crear una cuenta</a></p>

                <script>
                  // Función que se ejecutará al hacer clic en el botón
                  function abrirOtraPagina() {
                    // Cambiar la ubicación de la página a la URL deseada
                    window.location.href = 'index.php';
                  }
                </script>


              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>

<script>

</html >