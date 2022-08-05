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
      <form class="formulario" id="formulario" method="post" enctype="multipart/form-data" action="../php/registrar.php">
        <ul id="slide-content">
          <li class="">
            <div class="title">
              <h2>Empieza a crear tu cuenta</h2>
            </div>

            <div class="grupo_input formulario_grupo " id="grupo__nombre">
              <label for="">Nombre</label>
              <input type="text" name="nombre" id="nombre" />
              <p class="formulario__input-error" style="color: var(--invalid);">Error! El nombre debe tener un mínimo de 4 caracteres</p>
            </div>

            <div class="grupo_input formulario_grupo " id="grupo__apellidos">
              <label for="">Apellidos</label>
              <input type="text" name="apellidos" id="apellido" />
              <p class="formulario__input-error" style="color: var(--invalid);">Error! El Apellido debe tener un mínimo de 4 caracteres</p>
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

            <div class="grupo_input formulario_grupo" id="grupo__general">
              <label for="">Puesto de trabajo deseado</label>
              <input type="text" name="puesto_deseado" id="puesto" />
              <p class="formulario__input-error" style="color: var(--invalid);">Error! este campo debe tener un mínimo de 4 carácteres</p>

            </div>

            <div class="grupo_input formulario_grupo" id="grupo__general">
              <label for="">Estado</label>
              <select name="estado" id="estado" >
                <option value=""></option>
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
              <p class="formulario__input-error" style="color: var(--invalid);">Error! debe seleccionar un estado</p>

            </div>
          </li>

          <li>
            <h2>Datos personales y profesionales</h2>
            <strong>Háblanos un poco de tí</strong>

            <div class="grupo_input">
              <label for="">Fecha de Nacimiento</label>
              <div class="triple">
                <select name="dia">
                  <option value="Dia">Dia</option>

                  <?php for ($i = 0; $i < 32; $i++) { ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option><?php


                                                                            }   ?>


                </select>

                <select name="mes">
                  <option value="">Mes</option>
                  <option value="Enero">Enero</option>
                  <option value="Febrero">Febrero</option>
                  <option value="Marzo">Marzo</option>
                  <option value="Abril">Abril</option>
                  <option value="Mayo">Mayo</option>
                  <option value="Junio">Junio</option>
                  <option value="Julio">Julio</option>
                  <option value="Agosto">Agosto</option>
                  <option value="Septiembre">Septiembre</option>
                  <option value="Octubre">Octubre</option>
                  <option value="Noviembre">Noviembre</option>
                  <option value="Diciembre">Diciembre</option>
                </select>

                <select name="ano">
                  <option value="Año">Año</option>
                  <?php
                  for ($i = 1930; $i < 2023; $i++) {  ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                  <?php
                  } ?>

                </select>
              </div>
            </div>

            <div class="grupo_input">
              <label for="">Tipo de identificación</label>
              <div class="doble">
                <select name="tipo_identificacion" id="">
                  <option value="">Selecciona</option>
                  <option value="Cedula">Cedula</option>
                  <option value="Pasaporte">Pasaporte</option>
                </select>

                <input type="text" name="numero_identificacion" />
              </div>
            </div>

            <div class="grupo_input">
              <label for="">Estado Civil</label>
              <select name="estado_civil">
                <option value="">Selecciona</option>
                <option value="Soltero">Soltero</option>
                <option value="Casado">Casado</option>

              </select>
            </div>

            <div class="grupo_input formulario_grupo" id="grupo__telefono" >
              <label for="">Teléfono</label>
              <input type="tel" name="telefono"/>
              <p class="formulario__input-error" style="color: var(--invalid);">Error! este campo debe ser numerico y debe contener minimo 10 carácteres y máximo 11</p>

            </div>

            <div class="grupo_input">
              <label for="">Foto</label>
              <input type="file" name="foto"/>
            </div>
           

            <div class="grupo_input">
              <label for="">Género</label>

              <select name="genero" id="">
                <option value="">Selecciona</option>
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
              </select>
            </div>

            <div class="grupo_input formulario_grupo" id="grupo__general" >
              <label for="">Titulo breve del currículum</label>
              <input type="text" name="titulo_curriculum" />
              <p class="formulario__input-error" style="color: var(--invalid);">Error! este campo debe tener un mínimo de 4 carácteres</p>

            </div>

            <div class="grupo_input formulario_grupo" id="grupo__general">
              <label for="">Descripción breve de tu perfil profesional</label>
              <textarea name="descripcion_perfil" id="" cols="30" rows="10"></textarea>
              <p class="formulario__input-error" style="color: var(--invalid);">Error! este campo debe tener un mínimo de 4 carácteres</p>

            </div>
          </li>
          <li>
            <h2>Datos personales y profesionales</h2>
            <strong>Háblanos un poco de tí</strong>

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
              <label for="">Centro Educativo</label>
              <input type="text" placeholder="Escribe tu centro educativo" name="centro_educativo"/>
            </div>

            <div class="grupo_input">
              <label for="">Estado</label>
              <select name="estado_nivel" id="">
                <option value="">Selecciona</option>
                <option value="Cursando">Cursando</option>
                <option value="Completado">Completado</option>
              </select>
            </div>
            <div class="grupo_input">
              <input type="submit" value="Finalizar" />
            </div>
          </li>
        </ul>
      </form>
    </div>
    <div class="card-footer">
      <button id="btn_next" >Continuar</button>
    </div>
  </div>

  <script src="../js/jquery.min.js"></script>
  <script src="../js/scripts.js"></script>
  <script src="../js/validacion.js"></script>
  <script src="../js/validar.js"></script>
</body>

</html>