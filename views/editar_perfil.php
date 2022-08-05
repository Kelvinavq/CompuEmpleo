<!-- <?php

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
  $id = $res['id'];

  

}

if (isset($_POST['nombre']) || isset($_POST['apellidos']) || isset($_POST['telefono']) || isset($_POST['estado']) || isset($_POST['dia']) || isset($_POST['mes']) || isset($_POST['ano']) || isset($_POST['tipo_identificacion']) || isset($_POST['numero_identificacion']) || isset($_POST['estado_civil']) || isset($_POST['genero']) || isset($_FILES['foto']['name'])) {

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $estado = $_POST['estado'];
  $telefono = $_POST['telefono'];


  $dia = $_POST['dia'];
  $mes = $_POST['mes'];
  $ano = $_POST['ano'];
  $tipo_identificacion = $_POST['tipo_identificacion'];
  $numero_identificacion = $_POST['numero_identificacion'];
  $estado_civil = $_POST['estado_civil'];
  $genero = $_POST['genero'];
  $foto = (isset($_FILES['foto']['name'])) ? $_FILES['foto']['name'] : "";

  $update = $connection->prepare("SELECT foto from usuario WHERE id = '$id' ");
  $update->execute();
  $consulta = $update->fetch(PDO::FETCH_LAZY);

  $fecha = new DateTime();
  $nombrefoto = $res['foto'];

  $nombreArchivo = ($foto != "") ? $fecha->getTimestamp() . "_" . $_FILES['foto']['name'] : $nombrefoto;
  $tmpfoto = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmpfoto, "../assets/profile/" . $nombreArchivo);

    if (isset($consulta['foto'])) {
      if (file_exists("../assets/profile/" . $consulta['foto'])) {
          unlink("../assets/profile/" . $consulta['foto']);
      }
  }
  

  $sql = $connection->prepare("UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', estado = '$estado', dia = '$dia', mes = '$mes', ano = '$ano', tipo_id = '$tipo_identificacion', estado_civil = '$estado_civil', genero = '$genero', foto = '$nombreArchivo', telefono = '$telefono' WHERE email = '$usuario'");

  $sql->execute();

  echo ' 
 <link rel="stylesheet" href="../css/modal.css" />
  
  <div class="fondo modal_active ">
        <div class="modal">
          <div class="modal_icono">
            <img src="../assets/icons/correcto.png" />
          </div>
  
          <div class="modal_mensaje">
            <span>Perfil actulizado satisfactoriamente!</span>
          </div>
          
          <a class="btn_modal" href="usuario.php">Aceptar</a>
        </div>
      </div>
      
  ';
}


?>  -->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editar - <?php echo $res['nombre'] . " " . $res['apellido'] ?></title>
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
    <form class="formulario_editar form_editar_info" method="POST" enctype="multipart/form-data">
    <div class="grupo_input_img">
                <label for="">Logo</label>
                <div class="img">
                    <input type="file" name="foto" />
                    <img src="../assets/profile/<?php echo $res['foto'] ?>" alt="">
                </div>
            </div>

      <div class="grupo_input">
        <label for="">Nombre</label>
        <input type="text" name="nombre" value="<?php echo $res['nombre'] ?>" />
      </div>

      <div class="grupo_input">
        <label for="">Apellido</label>
        <input type="text" name="apellido" value="<?php echo $res['apellido'] ?>" />
      </div>

      <div class="grupo_input">
        <label for="">Teléfono</label>
        <input type="text" name="telefono" value="<?php echo $res['telefono'] ?>" />
      </div>

      <div class="grupo_input">
        <label for="">Tipo de identificación</label>
        <div class="doble">
          <select name="tipo_identificacion" id="">
            <option value="<?php echo $res['tipo_id'] ?>"><?php echo $res['tipo_id'] ?></option>
            <option value="Cedula">Cedula</option>
            <option value="Pasaporte">Pasaporte</option>
          </select>

          <input type="text" name="numero_identificacion" value="<?php echo $res['numero_id'] ?>" />
        </div>
      </div>

      <div class="grupo_input">
        <label for="">Fecha de Nacimiento</label>
        <div class="triple">
          <select name="dia">
            <option value="<?php echo $res['dia'] ?>"><?php echo $res['dia'] ?></option>

            <?php for ($i = 0; $i < 32; $i++) { ?>
              <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php


            }   ?>
          </select>

          <select name="mes">
            <option value="<?php echo $res['mes'] ?>"><?php echo $res['mes'] ?></option>
            <option value="Enero">Enero</option>
            <option value="Febrero">Febrero</option>
            <option value="Marzo">Marzo</option>
            <option value="Abril">Abril</option>
            <option value="Mayo">Mayo</option>
            <option value="Junio">Junio</option>
            <option value="Julio">Julio</option>
            <option value="Agosto">Agosto</option>
            <option value="Septiembre">Septiembre</option>
            <option value="Octubre">Octubre</option>
            <option value="Noviembre">Noviembre</option>
            <option value="Diciembre">Diciembre</option>
          </select>

          <select name="ano">
            <option value="<?php echo $res['ano'] ?>"><?php echo $res['ano'] ?></option>
            <?php
            for ($i = 1930; $i < 2023; $i++) {  ?>
              <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php
            } ?>
          </select>
        </div>
      </div>

      <div class="grupo_input">
        <label for="">Género</label>

        <select name="genero" id="">
          <option value="<?php echo $res['genero'] ?>"><?php echo $res['genero'] ?></option>
          <option value="Hombre">Hombre</option>
          <option value="Mujer">Mujer</option>
        </select>
      </div>

      <div class="grupo_input">
        <label for="">Estado Civil</label>
        <select name="estado_civil">
          <option value="<?php echo $res['estado_civil'] ?>"><?php echo $res['estado_civil'] ?></option>
          <option value="Soltero">Soltero</option>
          <option value="Casado">Casado</option>
        </select>
      </div>

      <div class="grupo_input">
        <label for="">Estado</label>
        <select name="estado">
          <option value="<?php echo $res['estado'] ?>"><?php echo $res['estado'] ?></option>
          <option value="Amazonas">Amazonas</option>
          <option value="Anzoategui">Anzoategui</option>
          <option value="Apure">Apure</option>
          <option value="Aragua">Aragua</option>
          <option value="Barinas">Barinas</option>
          <option value="Bolívar">Bolívar</option>
          <option value="Carabobo">Carabobo</option>
          <option value="Cojedes">Cojedes</option>
          <option value="Delta Amacuro">Delta Amacuro</option>
          <option value="Delta Amacuro">Delta Amacuro</option>
          <option value="Falcon">Falcón</option>
          <option value="Guarico">Guárico</option>
          <option value="Lara">Lara</option>
          <option value="Merida">Mérida</option>
          <option value="Miranda">Miranda</option>
          <option value="Monagas">Monagas</option>
          <option value="Nueva Esparta">Nueva Esparta</option>
          <option value="Portuguesa">Portuguesa</option>
          <option value="Sucre">Sucre</option>
          <option value="Tachira">Táchira</option>
          <option value="Trujillo">Trujillo</option>
          <option value="Vargas">Vargas</option>
          <option value="Yaracuy">Yaracuy</option>
          <option value="Zulia">Zulia</option>
        </select>
      </div>

      <div class="grupo_input">
        <input type="submit" value="Guardar" />
      </div>
    </form>
  </main>
</body>

</html>