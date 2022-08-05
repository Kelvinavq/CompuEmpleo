<?php

$usuario = $_SESSION['usuario'];


$sql = $connection->prepare("SELECT * FROM usuario WHERE email = '$usuario'");
$sql->execute();
$res = $sql->fetch(PDO::FETCH_LAZY);




?>

<div class="spin">
  <div class="spinner"></div>
</div>

<nav>
  <input type="checkbox" class="checkburger" />
  <span class="hamburger"></span>
  <ul>
    <div class="img" id="enlace_menu">
      <img width="50" src="../assets/profile/<?php echo $res['foto']  ?>" alt="" />
      <div class="perfil">
        <span><?php echo $res['nombre'] . " " . $res['apellido'] ?></span>
        <span><?php echo $res['puesto_deseado']  ?></span>
      </div>
    </div>
    <li><a href="../views/buscar_ofertas.php">Buscar Ofertas</a></li>
    <li><a href="../views/ver_postulaciones.php">Ver Postulaciones</a></li>
    <li><a href="../views/PreviaPerfil.php">Ver Curriculum</a></li>
    <li><a href="../views/ajustes.php">Ajustes</a></li>
    <li><a href="../php/cerrar.php">Cerrar Sesión</a></li>
  </ul>

  <div class="title">
    <h1>CompuEmpleo</h1>
  </div>
</nav> 