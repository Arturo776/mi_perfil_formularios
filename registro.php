<?php

/*
Establecer sesión si no existe
*/
if (!isset($_SESSION))
{
  session_start();
}

/*
Importar la base de datos
*/
require 'database.php';

$success = null;

/*
Si el formulario ha sido enviado
*/
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  // Datos del formulario
  $email = (isset($_POST['usuario'])) ? $_POST['usuario'] : null;
  $pass = (isset($_POST['pass'])) ? $_POST['pass'] : null;
  $pass_2 = (isset($_POST['pass_2'])) ? $_POST['pass_2'] : null;
  $nombre = (isset($_POST['name'])) ? $_POST['name'] : null;
  $apellidos = (isset($_POST['surname'])) ? $_POST['surname'] : null;

  // Si los datos no están vacíos, se registra el usuario
  if ($email != null && $pass != null && $pass_2 != null && $nombre != null && $apellidos != null)
  {
    $nombre = strtolower($nombre);
    $apellidos = strtolower($apellidos);
    $bind_email = $email;

    // Comprobamos que no existe el usuario
    $stmt = $db->stmt_init();

    $stmt = $db->prepare("SELECT `id` FROM `users` WHERE `email` = ?");
    $stmt->bind_param("s", $bind_email);
    $stmt->execute();

    $stmt = $stmt->get_result();
    $log = $stmt->fetch_assoc();

    // Si no existe el usuario, se continúa
    if ($log === null)
    {
      $stmt->close();

      // Si las contraseñas son idénticas, se registra el usuario
      if ($pass === $pass_2)
      {
        // Se encripta la contraseña
        $hashed_pass = sha1($pass);

        // Se registra el usuario
        $stmt = $db->stmt_init();
        $stmt = $db->prepare("INSERT INTO `users` (`usuario`, `nombre`, `apellidos`, `email`, `rol`, `pass`) VALUES (?, ?, ?, ?, 1, ?)");
        $stmt->bind_param('sssss', $email, $nombre, $apellidos, $email, $hashed_pass);

        // Si la operación ha sido exitosa, se redirige al index
        if ($stmt->execute() === true)
        {
          $stmt->close();

          header('Location: index.php');
        }
        else {
          $error = 'No se ha podido registrar';
        }
      }
      else {
        $error = 'Las contraseñas no coinciden';
      }
    }
    else {
      $error = 'Email ya registrado';
    }
  }
  else {
    $error = 'Ningún campo puede estar vacío';
  }
}


require 'html/registro.html.php';

?>
