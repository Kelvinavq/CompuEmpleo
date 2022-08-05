<?php
// Varios destinatarios
$para  = $email ; // atención a la coma


// título
$título = 'Restablecer Contraseña';
$codigo = rand(1000, 9999);



// mensaje
$mensaje = '
<html>
<head>
  <title>Restablecer Contraseña</title>
</head>
<body>
  <h1>Restablecer Contraseña</h1>

  <h2>Codigo</h2>

  <div>
     <h3>'.$codigo.'</h3>
  </div>

  <span>Para restablecer da click <a href="http://localhost/Compu_Empleo/views/recuperar2.php?email='.$email.'&token='.$token.'">Aqui!</a></span>


  
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Enviarlo

$enviado = false;

if (mail($para, $título, $mensaje, $cabeceras)) {
    $enviado = true;
}

?>