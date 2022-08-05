<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro</title>
  <link rel="stylesheet" href="../css/registro.css" />
  <link rel="stylesheet" href="../css/validar.css" />
  <link rel="icon" href="../assets/img/Logo.png">

</head>

<body>
  <div class="spin">
    <div class="spinner"></div>
  </div>

  <header>
    <div class="atras">
      <button id="btn_prev">
        <span>
          < </span>
      </button>
    </div>
    <div class="title">
      <h1>CompuEmpleo</h1>
    </div>
  </header>

  <ul class="steps" id="steps">
    <li class="circle">
      <div class="innerCircle">
        <i class="icofont-lock"></i>
      </div>
    </li>
    <li class="line">
      <div class="innerLine"></div>
    </li>
    <li class="circle">
      <div class="innerCircle">
        <i class="icofont-user"></i>
      </div>
    </li>
    <li class="line">
      <div class="innerLine"></div>
    </li>
    <li class="circle">
      <div class="innerCircle">
        <i class="icofont-check"></i>
      </div>
    </li>
  </ul>

  <div class="card">
    <div class="content">
      <form method="post" enctype="multipart/form-data" action="../php_empresa/registrar.php">
        <ul id="slide-content">
          <li>
            <h2>Empieza a crear tu cuenta de Empresa</h2>
            <div class="grupo_input formulario_grupo " id="grupo__nombre">
              <label for="">Nombre</label>
              <input type="text" name="nombre" id="nombre" />
              <p class="formulario__input-error" style="color: var(--invalid);">Error! El nombre debe tener un mínimo de 4 caracteres</p>
            </div>

            <div class="grupo_input formulario_grupo" id="grupo__telefono" >
              <label for="">Teléfono</label>
              <input type="tel" name="telefono"/>
              <p class="formulario__input-error" style="color: var(--invalid);">Error! este campo debe ser numerico y debe contener minimo 10 carácteres y máximo 11</p>

            </div>

            <div class="grupo_input formulario_grupo" id="grupo__correo">
              <label for="">Email</label>
              <input type="email" name="correo" id="correo"  />
              <p class="formulario__input-error" style="color: var(--invalid);">Error! El correo solo puede contener letras, numeros, puntos, guiones y guion bajo</p>

            </div>

            <div class="grupo_input formulario_grupo" id="grupo__pass" >
              <label for="">Contraseña</label>
              <input type="password" name="pass" id="password" />
              <p class="formulario__input-error" style="color: var(--invalid);">Error! La contraseña debe tener un mínimo de 4 carácteres</p>
            </div>

            <div class="grupo_input formulario_grupo" id="grupo__nombre" >
              <label for="">Nombre de la empresa</label>
              <input type="text" name="nombre_empresa" id="nombre" />
              <p class="formulario__input-error" style="color: var(--invalid);">Error! El nombre debe tener un mínimo de 4 caracteres</p>
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
          </li>

          <li>
            <h2>Datos personales y profesionales</h2>
            <strong>Información de Contacto</strong>

            
            <div class="grupo_input">
              <label for="">Tipo de identificación</label>
              <div class="doble">
                <select name="tipo_identificacion" id="">
                  <option value="">Selecciona</option>
                  <option value="Rif">Rif</option>
                </select>

                <input type="text" name="numero_identificacion" />
              </div>
            </div>

            <div class="grupo_input">
              <label for="">Dirección de la empresa</label>
              <textarea name="direccion" id="" cols="30" rows="10"></textarea>
            </div>
         
        
            <div class="grupo_input">
              <label for="">Logo</label>
              <input type="file" name="logo"/>
            </div>
           

           
          </li>
          <li>
            <h2>Descripción General</h2>
            <strong>Háblanos un poco de tu empresa</strong>

            
            <div class="grupo_input">
              <label for="">Número de trabajadores</label>
              <select name="numero_trabajadores" id="">
                <option value="">Selecciona</option>
                <option value="10">10 o menos</option>
                <option value="50">50 o menos</option>
                <option value="100">mas de 100</option>

              </select>
            </div>

            <div class="grupo_input">
              <label for="">Descripción de la empresa</label>
              <textarea name="descripcion_empresa" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="grupo_input">
              <input type="submit" value="Finalizar" />
            </div>
          </li>
        </ul>
      </form>
    </div>
    <div class="card-footer">
      <button id="btn_next">Continuar</button>
    </div>
  </div>

  <script src="../js/jquery.min.js"></script>
  <script src="../js/scripts.js"></script>
  <script src="../js/validacion.js"></script>
  <script src="../js/validar.js"></script>
  
</body>

</html>