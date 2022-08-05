<?php

include("../config/conexion.php");

session_start();

if (!isset($_SESSION['usuario'])) {

  echo "
  <script>
  alert('Debes iniciar sesion');
  window.location = '../empresa/index.php';
  </script>";

  session_destroy();
  die();
} else {
  $usuario = $_SESSION['usuario'];


  $sql = $connection->prepare("SELECT * FROM empresa WHERE email = '$usuario'");
  $sql->execute();
  $res = $sql->fetch(PDO::FETCH_LAZY);
  $id_empresa = $res['id'];
}


$cargo = $_POST['cargo'];
$titulo_oferta = $_POST['titulo_oferta'];
$area = $_POST['area'];
$descripcion_tarea = $_POST['descripcion_tarea'];
$estado = $_POST['estado'];
$jornada_laboral = $_POST['jornada_laboral'];
$tipo_contrato = $_POST['tipo_contrato'];
$salario = $_POST['salario'];
$anos_experiencia = $_POST['anos_experiencia'];
$edad_minima = $_POST['edad_minima'];
$idioma = $_POST['idioma'];
$nivel_estudio = $_POST['nivel_estudio'];


$insert = $connection->prepare("INSERT INTO ofertas (id_empresa, cargo, titulo_oferta, area, descripcion, estado, jornada_laboral, tipo_contrato, salario, anos_experiencia, edad_minima, estudios_minimos) VALUES('$id_empresa', '$cargo', '$titulo_oferta' , '$area', '$descripcion_tarea', '$estado', '$jornada_laboral', '$tipo_contrato', '$salario', '$anos_experiencia', '$edad_minima', '$nivel_estudio')");

$insert->execute();

$sql2 = $connection->prepare("SELECT MAX(id) AS id FROM ofertas");
$sql2->execute();
$resultado = $sql2->fetch(PDO::FETCH_LAZY);
$id_oferta = $resultado['id'];


$sql3 = $connection->prepare("INSERT INTO idiomas_empresa (id_empresa, id_oferta, idioma) VALUES('$id_empresa', '$id_oferta', '$idioma')");
$sql3->execute();

echo '
    <link rel="stylesheet" href="../css/modal.css" />
    
    <div class="fondo modal_active ">
          <div class="modal">
            <div class="modal_icono">
              <img src="../assets/icons/correcto.png" />
            </div>
    
            <div class="modal_mensaje">
              <span>Se ha publicado tu oferta satisfactoriamente!</span>
            </div>
            
            <a class="btn_modal" href="../empresa/empresa.php">Aceptar</a>
          </div>
        </div>
        
    ';
