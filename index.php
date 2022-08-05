<!-- <?php
include("config/conexion.php");

// consultar numero ofertas
$sql  = $connection->prepare("SELECT * FROM ofertas");
$sql->execute();
$num_ofertas = $sql->rowCount();

// consultar numero ofertas
$sql2  = $connection->prepare("SELECT * FROM usuario");
$sql2->execute();
$num_usuarios = $sql2->rowCount();

?> -->

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CompuEmpleo</title>
  <link rel="stylesheet" href="css/index.css" />
  <link rel="icon" href="assets/img/Logo.png">
  
  <script src="js/jquery.min.js"></script>
</head>

<body>
  <div class="spin">
    <div class="spinner"></div>
  </div>

  <header class="header">
    <div class="container_header">
      <div class="title">
        <h1>CompuEmpleo</h1>
      </div>

      <div class="descripcion">
        <p>Te ayudamos a encontrar el empleo ideal para ti de forma rápida</p>
      </div>

      <div class="btn_header">

      <div class="enlaces">
      <span>¿Buscas empleo?</span>
      <form class="form_2" action="views/login.php">
        <div class="btn">
          <input type="submit" value="Ingresar" />
        </div>
      </form>
    </div>

    <div class="enlaces ">
      <span>¿Eres una empresa?</span>
      <form class="form_2" action="empresa/index.php">
        <div class="btn">
          <input type="submit" value="Ingresar" />
        </div>
      </form>
    </div>
    </div>
      <!-- <div class="form">
        <form ">
          <div class="grupo_input">
            <input onkeypress="buscar_ahora($('#buscar_1').val());" type="text" name="buscar_1" id="buscar_1" placeholder="Cargo o área" />
          </div>

          <div class="grupo_input">
          <input onkeypress="buscar_ahora2($('#buscar_2').val());" type="text" name="buscar_2" id="buscar_2" placeholder="Lugar" />
          </div>


        </form> -->
      </div>
    </div>
  </header>

  <main>

    <div class="resultados">
      <div id="datos_buscador"></div>
    </div>

    <h2 class="tit">Nuestras cifras hasta ahora!</h2>
    <div class="cifras">
      <div class="numeros">
        <span>+ <?php echo $num_ofertas -1?></span>
        <strong>Ofertas de Empleo</strong>
      </div>

      <div class="numeros">
        <span>+ <?php echo $num_usuarios -1?></span>
        <strong>Usuarios Registrados</strong>
      </div>
    </div>

    
  </main>


  <script type="text/javascript">
    function buscar_ahora(buscar) {
      var parametros = {
        "buscar": buscar
      };
      $.ajax({
        data: parametros,
        type: 'POST',
        url: 'buscador.php',
        success: function(data) {
          document.getElementById("datos_buscador").innerHTML = data;
        }
      });
    }

    function buscar_ahora2(buscar) {
      var parametros = {
        "buscar": buscar
      };
      $.ajax({
        data: parametros,
        type: 'POST',
        url: 'buscador2.php',
        success: function(data) {
          document.getElementById("datos_buscador").innerHTML = data;
        }
      });
    }
  </script>

  <script src="js/scripts.js"></script>
</body>

</html>