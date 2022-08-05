<?php

$usuario = $_SESSION['usuario'];


$sql = $connection->prepare("SELECT * FROM empresa WHERE email = '$usuario'");
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
      <img width="50" src="../assets/logo_empresa/<?php echo $res['logo']  ?>" alt="" />
      <div class="perfil">
        <span><?php echo $res['nombre_empresa']?></span>
      </div>
    </div>
    <li><a href="../empresa/nueva_oferta.php">Nueva Oferta</a></li>
    <li><a href="../empresa/ajustes.php">Ajustes</a></li>
    <li><a href="../php_empresa/cerrar.php">Cerrar Sesión</a></li>
  </ul>

  <div class="title">
    <h1>CompuEmpleo</h1>
  </div>
</nav>