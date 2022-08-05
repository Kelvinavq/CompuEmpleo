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
    $id_oferta = $_POST['id_oferta'];
    $id_empresa = $_POST['id_empresa'];


    // buscar ofertas

    $buscar = $connection->prepare("SELECT * FROM ofertas WHERE id = '$id_oferta'");
    $buscar->execute();
    $oferta = $buscar->fetch(PDO::FETCH_LAZY);

    // buscar empresa

    $buscar_empresa = $connection->prepare("SELECT * FROM empresa WHERE id = '$id_empresa'");
    $buscar_empresa->execute();
    $empresa = $buscar_empresa->fetch(PDO::FETCH_LAZY);

    // buscar empresa

    $buscar_usuario = $connection->prepare("SELECT * FROM usuario WHERE email = '$usuario'");
    $buscar_usuario->execute();
    $usuario_res = $buscar_usuario->fetch(PDO::FETCH_LAZY);
    $id_usuario = $usuario_res['id'];
}



if (isset($_POST['id_usuario']) && isset($_POST['id_empresa']) && isset($_POST['id_oferta'])) {

    $user = $_POST['id_usuario'];
    $ofert = $_POST['id_oferta'];
    $empress = $_POST['id_empresa'];

    $post = $connection->prepare("INSERT INTO postulados (id_empresa, id_oferta, id_usuario, estatus) VALUES('$empress','$ofert','$user','Postulado')");
    $post->execute();

    echo '
<link rel="stylesheet" href="../css/modal.css" />

<div class="fondo modal_active ">
      <div class="modal">
        <div class="modal_icono">
          <img src="../assets/icons/correcto.png" />
        </div>

        <div class="modal_mensaje">
          <span>Te has postulado satisfactoriamente!</span>
        </div>
        
        <a class="btn_modal" href="usuario.php">Aceptar</a>
      </div>
    </div>
    
';
}

$validar_postulacion = $connection->prepare("SELECT * FROM postulados WHERE id_oferta = '$id_oferta' AND id_usuario = '$id_usuario'");
$validar_postulacion->execute();
$res_postulacion = $validar_postulacion->fetch(PDO::FETCH_LAZY);
$cont_postulacion = $validar_postulacion->rowCount();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $oferta['cargo'] . " - " . $oferta['area'] ?></title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/usuario.css">
  <link rel="icon" href="../assets/img/Logo.png">


</head>

<body>
    <header>
        <div class="btn_salir">
            <a href="buscar_ofertas.php" class="salir">X</a>
        </div>

        <div class="foto">
            <img src="../assets/logo_empresa/<?php echo $empresa['logo'] ?>" />
        </div>

        <div class="textos">
            <h2><?php echo $empresa['nombre_empresa'] ?></h2>
            <span><?php echo $empresa['estado'] ?></span>
        </div>


        <div class="contacto">
            <span><?php echo $empresa['email'] ?></span>
            <span><?php echo $empresa['telefono'] ?></span>
            <span><?php echo $empresa['tipo_id'] . ": " . $empresa['rif'] ?></span>

        </div>
    </header>

    <main>
        <div class="contenedor">
            <div class="title_editar">
                <h2><?php echo $oferta['cargo'] . " - " . $oferta['titulo_oferta'] ?></h2>
            </div>

            <div class="texto">
                <p>
                    <?php echo $oferta['descripcion'] ?>
                </p>
            </div>
        </div>

        <div class="contenedor">
            <div class="title_editar">
                <h2>Requisitios</h2>
            </div>

            <div class="texto">
                <p>
                    Area: <?php echo $oferta['area'] ?>
                </p>
            </div>

            <div class="texto">
                <p>
                    Años experiencia: <?php echo $oferta['anos_experiencia'] ?>
                </p>
            </div>

            <div class="texto">
                <p>
                    Edad minima: <?php echo $oferta['edad_minima'] ?>
                </p>
            </div>

            <div class="texto">
                <p>
                    Estudios Mínimos: <?php echo $oferta['estudios_minimos'] ?>
                </p>
            </div>
        </div>

        <div class="contenedor">
            <div class="title_editar">
                <h2>Información Adicional</h2>
            </div>

            <div class="texto">
                <p>
                    Residir en el estado: <?php echo $oferta['estado'] ?>
                </p>
            </div>

            <div class="texto">
                <p>
                    Jornada Laboral: <?php echo $oferta['jornada_laboral'] ?>
                </p>
            </div>

            <div class="texto">
                <p>
                    Tipo de Contrato: <?php echo $oferta['tipo_contrato'] ?>
                </p>
            </div>

            <div class="texto">
                <p>
                    Salario Neto Mensual: <?php echo $oferta['salario'] ?> USD
                </p>
            </div>
        </div>

        <?php
        if ($cont_postulacion > 0) {
            echo '<div class="mensaje">
                <span>Ya te has Postulado a esta oferta!</span>
            </div>';
        } else { ?>
            <form method="post" class="btn_postular">
                <div class="grupo">
                    <input type="hidden" name="id_oferta" value="<?php echo $id_oferta ?>">
                    <input type="hidden" name="id_empresa" value="<?php echo $id_empresa ?>">
                    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                    <input type="submit" value="Postularme">
                </div>
            </form>

        <?php } ?>




    </main>

    <style>
        form {
            width: 100%;
            height: 100%;
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .grupo {
            width: 50%;
            height: 100%;

        }

        .grupo input {
            width: 100%;
            height: 50px;
            border-radius: 30px;
            background: var(--primario);
            border: none;
            outline: none;
            cursor: pointer;
            color: var(--blanco);
            font-size: 1.2em;
            font-weight: bold;
        }

        .mensaje{
            text-align: center;
            margin-top: 25px;
            color: var(--valid);
        }
    </style>

    <script src="../js/login.js"></script>
</body>

</html>