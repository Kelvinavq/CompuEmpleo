<?php

include("../config/conexion.php");
session_start();

if (!isset($_SESSION['usuario'])) {

    echo "
  <script>
  alert('Debes iniciar sesion');
  window.location = 'ingresar.php';
  </script>";

    session_destroy();
    die();
} else {
    $usuario = $_SESSION['usuario'];


    $sql = $connection->prepare("SELECT * FROM empresa WHERE email = '$usuario'");
    $sql->execute();
    $res = $sql->fetch(PDO::FETCH_LAZY);
    $id = $res['id'];
}


if (isset($_POST['nombre']) || isset($_POST['telefono']) || isset($_POST['correo']) || isset($_POST['pass']) || isset($_POST['nombre_empresa']) || isset($_POST['estado']) || isset($_POST['tipo_identificacion']) || isset($_POST['numero_identificacion']) || isset($_POST['direccion']) || isset($_POST['numero_trabajadores']) || isset($_POST['descripcion_empresa']) || isset($_FILES['logo']['name'])) {

    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $nombre_empresa = $_POST['nombre_empresa'];
    $estado = $_POST['estado'];

    $tipo_identificacion = $_POST['tipo_identificacion'];
    $numero_identificacion = $_POST['numero_identificacion'];
    $direccion = $_POST['direccion'];
    $logo = (isset($_FILES['logo']['name'])) ? $_FILES['logo']['name'] : "";

    $numero_trabajadores = $_POST['numero_trabajadores'];
    $descripcion_empresa = $_POST['descripcion_empresa'];

    $update = $connection->prepare("SELECT logo from empresa WHERE id = '$id' ");
    $update->execute();
    $consulta = $update->fetch(PDO::FETCH_LAZY);

    $fecha = new DateTime();
    $nombrelogo = $res['logo'];

    $nombreArchivo = ($logo != "") ? $fecha->getTimestamp() . "_" . $_FILES['logo']['name'] : $nombrelogo;
    $tmplogo = $_FILES['logo']['tmp_name'];

    move_uploaded_file($tmplogo, "../assets/logo_empresa/" . $nombreArchivo);

    if (isset($consulta['logo'])) {
        if (file_exists("../assets/logo_empresa/" . $consulta['logo'])) {
            unlink("../assets/logo_empresa/" . $consulta['logo']);
        }
    }


    $sql = $connection->prepare("UPDATE empresa SET nombre = '$nombre', telefono = '$telefono', nombre_empresa = '$nombre_empresa', estado = '$estado', tipo_id = '$tipo_identificacion', rif = '$numero_identificacion', direccion = '$direccion', logo = '$nombreArchivo', numero_trabajadores = '$numero_trabajadores', descripcion = '$descripcion_empresa' WHERE email = '$usuario'");

    $sql->execute();

    echo '
    <link rel="stylesheet" href="../css/modal.css" />
    
    <div class="fondo modal_active ">
          <div class="modal">
            <div class="modal_icono">
              <img src="../assets/icons/correcto.png" />
            </div>
    
            <div class="modal_mensaje">
              <span>Perfil actualizado satisfactoriamente!</span>
            </div>
            
            <a class="btn_modal" href="empresa.php">Aceptar</a>
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
    <title>Actualizar Datos - <?php echo $res['nombre'] ?></title>
    <link rel="stylesheet" href="../css/editar_perfil.css" />
  <link rel="icon" href="../assets/img/Logo.png">

</head>

<body>
    <header>
        <a href="ajustes.php">
            < </a>
                <div class="textos">
                    <h2>Sobre tu empresa</h2>
                    <span>Datos personales y de contacto</span>
                </div>
    </header>

    <main>
        <form method="POST" enctype="multipart/form-data">
            <div class="grupo_input">
                <label for="">Nombre</label>
                <input type="text" name="nombre" value="<?php echo $res['nombre'] ?>" />
            </div>

            <div class="grupo_input">
                <label for="">Telefono</label>
                <input type="tel" name="telefono" value="<?php echo $res['telefono'] ?>" />
            </div>

            <div class="grupo_input">
                <label for="">Nombre de la empresa</label>
                <input type="text" name="nombre_empresa" value="<?php echo $res['nombre_empresa'] ?>" />
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
                <label for="">Tipo de identificación</label>
                <div class="doble">
                    <select name="tipo_identificacion" id="">
                        <option value="<?php echo $res['tipo_id'] ?>"><?php echo $res['tipo_id'] ?></option>
                        <option value="Rif">Rif</option>
                    </select>

                    <input type="text" name="numero_identificacion" value="<?php echo $res['rif'] ?>" />
                </div>
            </div>

            <div class="grupo_input">
                <label for="">Dirección de la empresa</label>
                <textarea name="direccion" id="" cols="30" rows="10"><?php echo $res['direccion'] ?></textarea>
            </div>


            <div class="grupo_input_img">
                <label for="">Logo</label>
                <div class="img">
                    <input type="file" name="logo" />
                    <img src="../assets/logo_empresa/<?php echo $res['logo'] ?>" alt="">
                </div>
            </div>

            <div class="grupo_input">
                <label for="">Número de trabajadores</label>
                <select name="numero_trabajadores" id="">
                    <option value="<?php echo $res['numero_trabajadores'] ?>"><?php echo $res['numero_trabajadores'] ?></option>
                    <option value="10">10 o menos</option>
                    <option value="50">50 o menos</option>
                    <option value="100">mas de 100</option>

                </select>
            </div>

            <div class="grupo_input">
                <label for="">Descripción de la empresa</label>
                <textarea name="descripcion_empresa" id="" cols="30" rows="10"><?php echo $res['descripcion'] ?></textarea>
            </div>

            <div class="grupo_input">
                <input type="submit" value="Guardar" />
            </div>
        </form>
    </main>
</body>

</html>