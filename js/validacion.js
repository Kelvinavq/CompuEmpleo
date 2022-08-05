// login 1

$(document).ready(function () {
  $("#login").click(function () {
    var correo = $("#correo").val();

    if (correo == "") {
      alert("Ingrese un correo electronico válido");
      return false;
    }
  });
});


// recuperar contraseña
$(document).ready(function () {
  $("#login_dos").click(function () {
    var password = $("#password").val();

    if (password == "") {
      alert("Ingrese una contraseña");
      return false;
    }
  });
});


// recuperar contraseña

$(document).ready(function () {
  $("#recuperar").click(function () {
    var password = $("#password").val();

    if (password == "") {
      alert("Ingrese una contraseña");
      return false;
    }
  });
});


  