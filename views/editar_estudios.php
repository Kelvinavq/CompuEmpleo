<?php

include("../config/conexion.php");
session_start();

if (!isset($_SESSION['usuario'])) {

    echo "
  <script>
  alert('Debes iniciar sesion');
  window.location = 'login.php';
  </script>";

    session_destroy();
    die();
} else {
    $usuario = $_SESSION['usuario'];


    $sql = $connection->prepare("SELECT * FROM usuario WHERE email = '$usuario'");
    $sql->execute();
    $res = $sql->fetch(PDO::FETCH_LAZY);
}


if (isset($_POST['nivel_estudio']) || isset($_POST['centro_educativo'])) {

    $nivel_estudios = $_POST['nivel_estudio'];
    $centro_educativo = $_POST['centro_educativo'];



    $sql = $connection->prepare("UPDATE usuario SET  nivel_estudios = '$nivel_estudios', centro_educativo = '$centro_educativo'  WHERE email = '$usuario'");

    $sql->execute();

    echo '
<link rel="stylesheet" href="../css/modal.css" />

<div class="fondo modal_active ">
      <div class="modal">
        <div class="modal_icono">
          <img src="../assets/icons/correcto.png" />
        </div>

        <div class="modal_mensaje">
          <span>Se ha actualizado satisfactoriamente!</span>
        </div>
        
        <a class="btn_modal" href="usuario.php">Aceptar</a>
      </div>
    </div>
    
';
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Estudios - <?php echo $res['nombre'] . " " . $res['apellido'] ?></title>
    <link rel="stylesheet" href="../css/editar_perfil.css" />
    <link rel="icon" href="../assets/img/Logo.png">


</head>

<body>
    <header>
        <a href="usuario.php">
            <
                </a>
                <div class="textos">
                    <h2>Sobre ti</h2>
                    <span>Datos personales y de contacto</span>
                </div>
    </header>

    <main>
        <form method="POST" class="formulario_editar">

            <div class="grupo_input">
                <label for="">Nivel de estudios</label>
                <select name="nivel_estudio" id="">
                    <option value="<?php echo $res['nivel_estudios'] ?>"><?php echo $res['nivel_estudios'] ?></option>
                    <option value="Primaria">Primaria</option>
                    <option value="Bachiller">Bachiller</option>
                    <option value="Tecnico superior">Tecnico superior</option>
                    <option value="Universidad">Universidad</option>

                </select>
            </div>

            <div class="grupo_input">
              <label for="">Centro Educativo</label>
              <input type="text"  name="centro_educativo" value="<?php echo $res['centro_educativo'] ?>"/>
            </div>

            <div class="grupo_input">
                <input type="submit" value="Guardar" />
            </div>
        </form>
    </main>
</body>

</html>