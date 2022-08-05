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

}else{

  $usuario = $_SESSION['usuario'];

  $sql = $connection->prepare("SELECT * FROM empresa WHERE email = '$usuario'");
  $sql->execute();

  $resultado = $sql->fetch(PDO::FETCH_LAZY);


}

$id_oferta = $_POST['id_oferta'];

$sql = $connection->prepare("SELECT * FROM ofertas WHERE id = '$id_oferta'");
$sql->execute();
$oferta = $sql->fetch(PDO::FETCH_LAZY);

$sql2 = $connection->prepare("SELECT * FROM idiomas_empresa WHERE id_oferta = '$id_oferta'");
$sql2->execute();
$idioma = $sql2->fetch(PDO::FETCH_LAZY);



if (isset($_POST['cargo']) && isset($_POST['titulo_oferta']) && isset($_POST['area']) && isset($_POST['descripcion_tarea']) && isset($_POST['estado']) && isset($_POST['jornada_laboral']) && isset($_POST['tipo_contrato']) && isset($_POST['salario']) && isset($_POST['anos_experiencia']) && isset($_POST['idioma']) && isset($_POST['nivel_estudio']) && isset($_POST['edad_minima']) && isset($_POST['id'])) {



    $cargo = $_POST['cargo'];
    $area = $_POST['area'];
    $titulo_oferta = $_POST['titulo_oferta'];
    $descripcion_tarea = $_POST['descripcion_tarea'];
    $estado = $_POST['estado'];
    $jornada_laboral = $_POST['jornada_laboral'];
    $tipo_contrato = $_POST['tipo_contrato'];
    $salario = $_POST['salario'];
    $anos_experiencia = $_POST['anos_experiencia'];
    $idioma = $_POST['idioma'];
    $nivel_estudio = $_POST['nivel_estudio'];
    $edad_minima = $_POST['edad_minima'];

    $id_ofe = $_POST['id'];



    

    $actualizar = $connection->prepare("UPDATE ofertas SET cargo = '$cargo', titulo_oferta = '$titulo_oferta', area = '$area', descripcion = '$descripcion_tarea', estado = '$estado', jornada_laboral = '$jornada_laboral', tipo_contrato = '$tipo_contrato', salario = '$salario', anos_experiencia = '$anos_experiencia', edad_minima = '$edad_minima', estudios_minimos = '$nivel_estudio' WHERE id = '$id_ofe'");

    $actualizar->execute();

    $sql2 = $connection->prepare("UPDATE idiomas_empresa SET idioma = '$idioma' WHERE id_oferta = '$id_ofe'");
    $sql2->execute();


    echo '
    <link rel="stylesheet" href="../css/modal.css" />
    
    <div class="fondo modal_active ">
          <div class="modal">
            <div class="modal_icono">
              <img src="../assets/icons/correcto.png" />
            </div>
    
            <div class="modal_mensaje">
              <span>Se ha editado tu oferta satisfactoriamente!</span>
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
    <title>Editar Oferta - <?php echo $resultado['nombre'] ?></title>
    <link rel="stylesheet" href="../css/nueva_oferta.css" />
  <link rel="icon" href="../assets/img/Logo.png">

</head>

<body>


    <main>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id_oferta ?>">
            <div class="grupo_input">
                <label>Cargo</label>
                <input type="text" name="cargo" value="<?php echo $oferta['cargo']  ?>">
            </div>

            <div class="grupo_input">
                <label>Complemento al título</label>
                <input type="text" name="titulo_oferta" value="<?php echo $oferta['titulo_oferta'] ?> ">
            </div>

            <div class="grupo_input">
                <label>Área</label>
                <select name="area">
                    <option value="<?php echo $oferta['area'] ?>"><?php echo $oferta['area'] ?></option>
                    <option value="Administracion">Administración</option>
                    <option value="Atencion al cliente">Atención al cliente</option>
                    <option value="Diseño grafico">Diseño gráfico</option>
                    <option value="Informatica">Informática</option>
                    <option value="Docencia">Docencia</option>
                </select>
            </div>

            <div class="grupo_input">
                <label>Descripción de tareas</label>
                <textarea name="descripcion_tarea" cols="30" rows="10"><?php echo $oferta['descripcion'] ?></textarea>
            </div>

            <div class="grupo_input">
                <label for="">Estado</label>
                <select name="estado">
                    <option value="<?php echo $oferta['estado'] ?>"><?php echo $oferta['estado'] ?></option>
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
                <label>Jornada Laboral</label>
                <select name="jornada_laboral">
                    <option value="<?php echo $oferta['jornada_laboral'] ?>"><?php echo $oferta['jornada_laboral'] ?></option>
                    <option value="Tiempo Completo">Tiempo Completo</option>
                    <option value="Por Horas">Por Horas</option>
                    <option value="Medio Tiempo">Medio Tiempo</option>
                    <option value="Desde Casa">Desde Casa</option>
                    <option value="Beca/Practicas">Beca/Practicas</option>
                </select>
            </div>

            <div class="grupo_input">
                <label>Tipo de Contrato</label>
                <select name="tipo_contrato">
                    <option value="<?php echo $oferta['tipo_contrato'] ?>"><?php echo $oferta['tipo_contrato'] ?></option>
                    <option value="Contrato por tiempo indefinido">Contrato por tiempo indefinido</option>
                    <option value="Contrato por tiempo determinado">Contrato por tiempo determinado</option>
                    <option value="Contrato de Aprendizaje">Contrato de Aprendizaje</option>
                </select>
            </div>

            <div class="grupo_input">
                <label>Salario (Neto mensual)</label>
                <input type="text" name="salario" value="<?php echo $oferta['salario'] ?>">
            </div>

            <div class="grupo_input">
                <label>Años de Experiencia</label>
                <select name="anos_experiencia">
                    <option value="<?php echo $oferta['anos_experiencia'] ?>"><?php echo $oferta['anos_experiencia'] ?></option>

                    <?php for ($i = 0; $i < 11; $i++) { ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option><?php


                                                                                }   ?>

                </select>
            </div>

            <div class="grupo_input">
                <label>Edad Mínima</label>
                <input type="text" name="edad_minima" value="<?php echo $oferta['edad_minima'] ?>">
            </div>

            <div class="grupo_input">
                <label for="">Idioma</label>
                <select name="idioma">
                    <option value="<?php echo $idioma['idioma'] ?>"><?php echo $idioma['idioma'] ?></option>
                    <option value="Español">Español</option>
                    <option value="Ingles">Ingles</option>
                    <option value="Portugues">Portugues</option>
                    <option value="Mandarin">Mandarin</option>
                </select>
            </div>

            <div class="grupo_input">
                <label for="">Nivel de estudios</label>
                <select name="nivel_estudio" id="">
                    <option value="<?php echo $oferta['estudios_minimos'] ?>"><?php echo $oferta['estudios_minimos'] ?></option>
                    <option value="Primaria">Primaria</option>
                    <option value="Bachiller">Bachiller</option>
                    <option value="Tecnico superior">Tecnico superior</option>
                    <option value="Universidad">Universidad</option>

                </select>
            </div>

            <div class="grupo_input">
                <input type="submit" value="Guardar">
            </div>

        </form>
    </main>


</body>

</html>