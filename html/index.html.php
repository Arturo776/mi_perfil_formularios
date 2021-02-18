<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!--
    Etiquetas -->
    <meta charset="utf-8">
    <!--
     CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/master.css">
    <!--
    JS -->
    <script src="/js/jquery-3.5.1.js" charset="utf-8"></script>
    <script src="/js/master.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/e6dc47c4f5.js" crossorigin="anonymous"></script>
    <!--
    Título -->
    <title>Mi Perfil - &Iacute;ndice </title>
  </head>
  <body>

    <!--
    Cabecera -->
    <header class="row border-bottom">
      <!--
      Título de la página -->
      <div class="col-md-2 border-end bg-warning py-2">
        <h2 class="text-center text-light mb-0">Mi Perfil</h2>
      </div>
    </header>

    <!--
    Cuerpo de la página -->
    <main class="row mt-5 px-5">
      <article class="col-md-6 border-end ps-5 ms-5 py-5">
        <!--
        Mensaje de error en el inicio de sesión -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
          if (isset($error)) {
        ?>
            <!--
            Error -->
            <div id="error" class="col-md-6 d-flex justify-content-between border border-danger rounded px-2 py-2 mb-1">
              <!--
              Mensaje -->
              <p class="fw-bold text-danger my-0"><?php echo $error; ?></p>
              <!--
              Ocultar mensaje -->
              <button class="btn btn-transparent fw-bold text-danger px-0 py-0" id="close_error" type="button" name="button"><i class="far fa-times-circle"></i></button>
            </div>
            <?php
          }
        }
        ?>

        <!--
        Formulario de inicio de sesión -->
        <form class="col-md-6 d-flex flex-column" action="index.php" method="POST">
          <!-- Usuario (email) -->
          <input class="text-center border rounded mb-1 py-2 px-1" type="text" name="usuario" placeholder="Usuario" value="<?php echo (isset($_POST['usuario'])) ? $_POST['usuario'] : '' ?>">
          <!-- Contraseña -->
          <input class="text-center border rounded mb-1 py-2 px-1" type="password" name="pass" placeholder="Contrase&ntilde;a">
          <!-- Botones del formulario -->
          <button class="btn btn-lg btn-warning text-light fw-bold px-3 py-2 mt-2" type="submit" name="button">Iniciar sesi&oacute;n</button>
          <a class="link-secondary text-center small mt-2" href="registro.php">o reg&iacute;strate</a>
        </form>
      </article>
    </main>

    <!-- Pie de página -->
    <footer class="fixed-bottom border-top d-flex align-items-center py-2">
      <p class="border-end mb-0 px-5">Mi Perfil © 2021 Arturo B. Mart&iacute;n</p>
      <a class="link-secondary px-5" target="_blank" href="https://getbootstrap.com/">Bootstrap</a>
      <a class="link-secondary px-5" target="_blank" href="https://jquery.com/">JQuery</a>
      <a class="link-secondary px-5" target="_blank" href="https://github.com/Arturo776/mi_perfil_formularios">Repositorio (GitHub)</a>
      <a class="link-secondary px-5" target="_blank" href="https://fontawesome.com/">Font Awesome</a>
    </footer>

  </body>
</html>
