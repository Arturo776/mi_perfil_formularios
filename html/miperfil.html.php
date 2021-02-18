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

      <!--
      Saludo al usuario :) -->
      <?php if (isset($usuario)): ?>
      <div class="col-md-10 d-flex align-items-center justify-content-between py-2">
        <p class="bg-warning text-light rounded fw-bold py-1 px-2 mb-0 ms-4">Hola, <?php echo strtoupper($usuario['nombre']); ?> <i class="far fa-smile ms-2"></i></p>
        <a class="link-warning me-5" href="cerrarsesion.php" title="Cerrar sesi&oacute;n">¡Adi&oacute;s! <i class="far fa-handshake ms-2"></i></a>
      </div>
      <?php endif; ?>
    </header>

    <!--
    Cuerpo de la página -->
    <main class="row mt-5 px-5">
      <article class="col-md-6 border-end ps-5 ms-5 py-5">
        <!--
        Mensaje de error o de éxito en la actualización de los datos -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
          if (isset($success))
          {
            ?>
            <!--
            Éxito -->
            <div id="success" class="col-md-6 d-flex justify-content-between border border-success rounded px-2 py-2 mb-1">
              <!--
              Mensaje -->
                <p class="fw-bold text-success my-0"><?php echo $success; ?></p>
              <!--
              Ocultar mensaje -->
              <button class="btn btn-transparent fw-bold text-success px-0 py-0" id="close_success" type="button" name="button"><i class="far fa-times-circle"></i></button>
            </div>

            <?php
          } elseif (isset($error)) {
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
        Formulario para actualizar los datos -->
        <form class="col-md-6 d-flex flex-column" action="miperfil.php" method="POST">

          <?php if (isset($error)): ?>

            <!-- Email -->
            <input class="text-center border rounded mb-1 py-2 px-1" type="email" name="email" placeholder="Email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : '' ?>">
            <!-- Nombre -->
            <input class="text-center border rounded mb-1 py-2 px-1" type="text" name="nombre" placeholder="Nombre" value="<?php echo (isset($_POST['nombre'])) ? $_POST['nombre'] : '' ?>">
            <!-- Apellidos -->
            <input class="text-center border rounded mb-1 py-2 px-1" type="text" name="apellidos" placeholder="Apellidos" value="<?php echo (isset($_POST['apellidos'])) ? $_POST['apellidos'] : '' ?>">
            <!-- Rol -->
            <select class="text-center border rounded mb-1 py-2 px-1" name="rol">
              <?php foreach ($roles as $rol): ?>
                <?php if ($rol['id'] == $usuario['rol']): ?>
                <option selected value="<?php echo $rol['id'] ?>"><?php echo strtoupper($rol['rol']) ?></option>
                <?php else: ?>
                <option value="<?php echo $rol['id'] ?>"><?php echo strtoupper($rol['rol']) ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>

          <?php else: ?>

            <!-- Email -->
            <input class="text-center border rounded mb-1 py-2 px-1" type="email" name="email" placeholder="Email">
            <!-- Nombre -->
            <input class="text-center border rounded mb-1 py-2 px-1" type="text" name="nombre" placeholder="Nombre">
            <!-- Apellidos -->
            <input class="text-center border rounded mb-1 py-2 px-1" type="text" name="apellidos" placeholder="Apellidos">
            <!-- Rol -->
            <select class="text-center border rounded mb-1 py-2 px-1" name="rol">
              <?php foreach ($roles as $rol): ?>
                <?php if ($rol['id'] == $usuario['rol']): ?>
                <option selected value="<?php echo $rol['id'] ?>"><?php echo strtoupper($rol['rol']) ?></option>
                <?php else: ?>
                <option value="<?php echo $rol['id'] ?>"><?php echo strtoupper($rol['rol']) ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>

          <?php endif; ?>

          <!--
          Botones del formulario -->
          <button class="btn btn-lg btn-warning text-light fw-bold px-3 py-2 mt-2" type="submit" name="button">Actualizar</button>
        </form>
      </article>
    </main>

    <!-- Pie de página -->
    <footer class="fixed-bottom border-top d-flex align-items-center py-2">
      <p class="mb-0 px-5 border-end">Mi Perfil © 2021 Arturo B. Mart&iacute;n</p>
      <a class="link-secondary px-5" target="_blank" href="https://getbootstrap.com/">Bootstrap</a>
      <a class="link-secondary px-5" target="_blank" href="https://jquery.com/">JQuery</a>
      <a class="link-secondary px-5" target="_blank" href="https://github.com/Arturo776/mi_perfil_formularios">Repositorio (GitHub)</a>
      <a class="link-secondary px-5" target="_blank" href="https://fontawesome.com/">Font Awesome</a>
    </footer>

  </body>
</html>
