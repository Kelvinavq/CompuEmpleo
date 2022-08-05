<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CompuEmpleo - Iniciar Sesion</title>
    <link rel="stylesheet" href="../css/login.css" />
    <link rel="stylesheet" href="../css/validar.css" />
  <link rel="icon" href="../assets/img/Logo.png">


  </head>

  <body>
    <div class="spin">
      <div class="spinner"></div>
    </div>

    <header>
      <h1>CompuEmpleo</h1>
    </header>

    <main>
      <div class="textos">
        <h2>Tu próximo trabajo está aquí</h2>
        <span>Ingresa y postúlate a cientos de empleos</span>
      </div>

      <form id="formulario" action="../php/ingresar.php" method="post">
        <div class="grupo_input formulario_grupo" id="grupo__correo" >
          <label>Continúa con tu correo</label>
          <input type="email" name="correo" id="correo" />
          <p class="formulario__input-error" style="color: var(--invalid);">Error! El correo solo puede contener letras, numeros, puntos, guiones y guion bajo</p>
        </div>

        <div class="btn">
          <input id="login" type="submit" value="Continuar" />
        </div>
      </form>
    </main>

    <script src="../js/login.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/validar.js"></script>
    <script src="../js/validacion.js"></script>



  </body>
</html>
