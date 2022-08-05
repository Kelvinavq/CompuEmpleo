const expresiones = {
  // letras, nueros, guion y guion bajo
  nombre: /^[a-zA-ZÀ-ÿ\s]{4,40}$/,
  apellidos: /^[a-zA-ZÀ-ÿ\s]{4,40}$/,
  general: /^[a-zA-ZÀ-ÿ\s]{4,40}$/,
  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  // 4 a 12 digitos
  pass: /^.{4,12}$/,
  telefono: /^\d{10,11}$/
};

const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll("#formulario input");
const btn_next = document.getElementById("btn_next");

const campos = {
  nombre: false,
  apellidos: false,
  correo: false,
  pass: false,
  general: false,
  telefono: false,

};

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "nombre":
      validarCampo(expresiones.nombre, e.target, "nombre");
      break;

    case "apellidos":
      validarCampo(expresiones.apellidos, e.target, "apellidos");
      break;

    case "correo":
      validarCampo(expresiones.correo, e.target, "correo");
      break;

    case "pass":
      validarCampo(expresiones.pass, e.target, "pass");
      break;

    case "puesto_deseado":
      validarCampo(expresiones.general, e.target, "general");
      break;


      case "telefono":
      validarCampo(expresiones.telefono, e.target, "telefono");
      break;

  }
};

const validarCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document
      .getElementById(`grupo__${campo}`)
      .classList.remove("formulario__grupo-incorrecto");

    document
      .getElementById(`grupo__${campo}`)
      .classList.add("formulario__grupo-correcto");

    document
      .querySelector(`#grupo__$${campo} .formulario__input-error`)
      .classList.remove("formulario__input-error-activo");
  } else {
    document
      .getElementById(`grupo__${campo}`)
      .classList.add("formulario__grupo-incorrecto");

    document
      .getElementById(`grupo__${campo}`)
      .classList.remove("formulario__grupo-correcto");

    document
      .querySelector(`#grupo__$${campo} .formulario__input-error`)
      .classList.add("formulario__input-error-activo");
  }
};

inputs.forEach((input) => {
  input.addEventListener("keyup", validarFormulario);
  input.addEventListener("blur", validarFormulario);
});

