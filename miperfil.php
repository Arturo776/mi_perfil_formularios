<?php

if (!isset($_SESSION))
{
  session_start();
}

require 'database.php';

// Obtenemos los datos del usuario que vamos a utilizar
$stmt = $db->stmt_init();
$stmt = $db->prepare("SELECT `nombre`, `rol` FROM `users` WHERE `id` = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();

$usuario = $stmt->get_result();
$usuario = $usuario->fetch_assoc();

$stmt->close();

// Obtenemos los datos de la tabla `roles`
$roles = array();

for ($i = 1; $i <= 3; $i++)
{
$stmt = $db->stmt_init();
$stmt = $db->prepare("SELECT * FROM `roles` WHERE `id` = ?");
$stmt->bind_param("i", $i);
$stmt->execute();

$rol = $stmt->get_result();
$rol = $rol->fetch_assoc();

$stmt->close();

array_push($roles, $rol);
}

// Si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $email = (isset($_POST['email'])) ? $_POST['email'] : null;
  $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
  $apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : null;
  $rol = (isset($_POST['rol'])) ? $_POST['rol'] : null;

  if ($email != null && $nombre != null && $apellidos != null)
  {
    $nombre = strtolower($nombre);
    $apellidos = strtolower($apellidos);

    $stmt = $db->stmt_init();

    $stmt = $db->prepare("UPDATE `users` SET `email` = ?, `usuario` = ?, `nombre` = ?, `apellidos` = ?, `rol` = ? WHERE `id` = ?");
    $stmt->bind_param("sssssi", $email, $email, $nombre, $apellidos, $rol, $_SESSION['user_id']);

    if ($stmt->execute() === true)
    {
      $stmt->close();

      $success = 'Información actualizada';
    }
    else {
      $error = 'No se ha encontrado el usuario';
    }
  }
  else {
    $error = 'Ningún campo puede estar vacío';
  }
}

require 'html/miperfil.html.php';
?>
