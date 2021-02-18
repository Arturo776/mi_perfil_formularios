<?php

if (!isset($_SESSION))
{
  session_start();
}

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : null;
  $pass = (isset($_POST['pass'])) ? $_POST['pass'] : null;

  if ($usuario != null && $pass != null)
  {
    $hashed_pass = sha1($pass);

    $stmt = $db->stmt_init();

    $stmt = $db->prepare("SELECT * FROM `users` WHERE `usuario` = ? AND `pass` = ?");
    $stmt->bind_param("ss", $usuario, $hashed_pass);
    $stmt->execute();

    $stmt = $stmt->get_result();
    $log = $stmt->fetch_assoc();

    $stmt->close();

    if ($log != null)
    {
      if ($log['usuario'] === $usuario && $log['pass'] === sha1($pass))
      {
        $_SESSION['user_id'] = $log['id'];

        header('Location: miperfil.php');
      }
      else {
        $error = 'No se ha encontrado el usuario';
      }
    }
    else {
      $error = 'No existe el usuario';
    }
  }
  else {
    $error = 'Ningún campo puede estar vacío';
  }
}

require 'html/index.html.php';
?>
