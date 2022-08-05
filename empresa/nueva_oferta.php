<?php
include("../config/conexion.php");

session_start();

if (!isset($_SESSION['usuario'])) {

    echo "
  <script>
  alert('Debes iniciar sesion');
  window.location = 'index.php';
  </script>";

    session_destroy();
    die();
} else {

    $usuario = $_SESSION['usuario'];


    $sql = $connection->prepare("SELECT * FROM empresa WHERE email = '$usuario'");
    $sql->execute();
  
    $resultado = $sql->fetch(PDO::FETCH_LAZY);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nueva Oferta - <?php echo $resultado['nombre'] ?></title>
    <link rel="stylesheet" href="../css/nueva_oferta.css" />
  <link rel="icon" href="../assets/img/Logo.png">

</head>

<body>

    <main>
        <form action="../php_empresa/nueva_oferta.php" method="post">
            <div class="grupo_input">
                <label>Cargo</label>
                <input type="text" name="cargo" placeholder="Ej: Enfermera, Arquitecto.">
            </div>

            <div class="grupo_input">
                <label>Complemento al título</label>
                <input type="text" name="titulo_oferta" placeholder="Ej: Turno de noche, con experiencia, inglés">
            </div>
            
            <div class="grupo_input">
                <label>Área</label>
                <select name="area">
                    <option value="">Selecciona</option>
                    <option value="Administracion">Administración</option>
                    <option value="Atencion al cliente">Atención al cliente</option>
                    <option value="Diseño grafico">Diseño gráfico</option>
                    <option value="Informatica">Informática</option>
                    <option value="Docencia">Docencia</option>
                </select>
            </div>

            <div class="grupo_input">
                <label>Descripción de tareas</label>
                <textarea name="descripcion_tarea" cols="30" rows="10"></textarea>
            </div>

            <div class="grupo_input">
              <label for="">Estado</label>
              <select name="estado">
                <option value="">Selecciona</option>
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
                    <option value="">Selecciona</option>
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
                    <option value="">Selecciona</option>
                    <option value="Contrato por tiempo indefinido">Contrato por tiempo indefinido</option>
                    <option value="Contrato por tiempo determinado">Contrato por tiempo determinado</option>
                    <option value="Contrato de Aprendizaje">Contrato de Aprendizaje</option>
                </select>
            </div>

            <div class="grupo_input">
                <label>Salario (Neto mensual)</label>
                <input type="text" name="salario">
            </div>

            <div class="grupo_input">
                <label>Años de Experiencia</label>
                <select name="anos_experiencia">
                  <option value="Sin experiencia">Sin experiencia</option>

                  <?php for ($i = 0; $i < 11; $i++) { ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option><?php


                                                                            }   ?>

                </select>
            </div>

            <div class="grupo_input">
                <label>Edad Mínima</label>
                <input type="text" name="edad_minima">
            </div>

            <div class="grupo_input">
                <label for="">Idioma</label>
                <select name="idioma" >
                    <option value="">Selecciona</option>
                    <option value="Español">Español</option>
                    <option value="Ingles">Ingles</option>
                    <option value="Portugues">Portugues</option>
                    <option value="Mandarin">Mandarin</option>
                </select>
            </div>

            <div class="grupo_input">
              <label for="">Nivel de estudios</label>
              <select name="nivel_estudio" id="">
                <option value="">Selecciona tu nivel de estudios</option>
                <option value="Primaria">Primaria</option>
                <option value="Bachiller">Bachiller</option>
                <option value="Tecnico superior">Tecnico superior</option>
                <option value="Universidad">Universidad</option>

              </select>
            </div>

            <div class="grupo_input">
                <input type="submit" value="Publicar">
            </div>

        </form>
    </main>


</body>

</html>