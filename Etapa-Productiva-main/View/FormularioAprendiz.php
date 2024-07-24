<?php
include '../Controller/ficha.php';
include '../Controller/tipo_identificacion.php';
include '../Controller/tipo_vinculo.php';
include '../Controller/municipio.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/formulario.css">
    <link rel="shortcut icon" href="../Img/favicon.ico" type="image/x-icon">
    <title>Alternativa Productiva</title>
    <script src="../js/ficha.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/confirm.js"></script>
</head>
<body>
    <div class="imagenTitulo">
        <img src="../Img/Materiales2.jpg" alt="Imagen de título">
    </div>
    <div class="titulo">ALTERNATIVA PRODUCTIVA</div>    

    <div class="container">
        <div class="formulario">
            <form action="../Controller/Almacenamiento.php" id="miFormulario" method="post">
                <div class="entrada">
                    <label for="ficha">Número de Ficha</label>
                    <select class="select" id="fic_id" name="fic_id" onchange="updateFichaInfo()" required>
                        <?php echo $optionsFicha; ?>
                    </select>
                </div>
                <div class="entrada">
                    <label for="programa">Programa</label>
                    <input type="text" id="programa" name="programa" readonly>
                </div>
                <div class="entrada">
                    <label for="fecha_inicio_ficha">Fecha Inicio</label>
                    <input type="text" id="fecha_inicio_ficha" name="fecha_inicio_ficha" readonly>
                </div>
                <div class="entrada">
                    <label for="fecha_fin_ficha">Fecha Fin</label>
                    <input type="text" id="fecha_fin_ficha" name="fecha_fin_ficha" readonly>
                </div>
                <div class="entrada">
                    <label for="nombre">Nombre y apellidos del aprendiz</label>
                    <input class="select" type="text" id="nombre" name="nombre" required>
                </div>
                <div class="entrada">
                    <label for="tipo-id">Tipo de identificación</label>
                    <select class="select" id="tipo_id" name="tipo_id" required>
                        <?php echo $optionsDocum; ?>
                    </select>
                </div>
                <div class="entrada">
                    <label for="num-id">Número de identificación</label>
                    <input class="select" type="text" id="num_id" name="num_id" required>
                </div>
                <div class="entrada">
                    <label for="fecha-nacimiento">Fecha de Nacimiento</label>
                    <input class="select" type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
                </div>
                <div class="entrada">
                    <label for="direccion">Dirección de residencia</label>
                    <input class="select" type="text" id="direccion" name="direccion" required>
                </div>
                <div class="entrada">
                    <label for="municipio">Municipio de residencia</label>
                    <select class="select"  name="municipio" required>
                        <?php echo $optionsmunicipio; ?>
                    </select> 
                </div>
                <div class="entrada">
                    <label for="correo">Correo electrónico institucional</label>
                    <input class="select" type="email" id="correo" name="correo" required>
                </div>
                <div class="entrada">
                    <label for="telefono">Teléfono de contacto</label>
                    <input class="select" type="text" id="telefono_contacto" name="telefono_contacto" required>
                </div>
                <div class="entrada">
                    <label for="otros-telefonos">Otros teléfonos de contacto</label>
                    <input class="select" type="text" id="otros_telefonos" name="otros_telefonos">
                </div>
                <div class="entrada">
                    <label for="eps">EPS a la que está afiliado</label>
                    <input class="select" type="text" id="eps" name="eps" required>
                </div>
                <div class="entrada">
                    <label for="vinculo">Tipo de vínculo</label>
                    <select class="select" id="tipo_vinculo" name="tipo_vinculo" required>
                        <?php echo $optionsVinculo; ?>
                    </select>
                </div> 
                
                <div class="boton">
                    <input class="boton" type="submit" value="Registrar">
            <br>
            <br>
                 <a href="../index.html"> <input class="boton" type="button" value="Volver" /> </a>
                </div>
           </form>
        </div>
    </div>
    
    <div class="Informacion">
        <div class="more-information">
            Servicio Nacional de Aprendizaje SENA - Dirección General -
            Calle 57 No. 8 - 69 Bogotá D.C. (Cundinamarca), Colombia<br>
            Conmutador Nacional (57 1) 5461500 - Extensiones -
            Atención presencial: lunes a viernes 8:00 a.m. a 5:30 p.m.<br>
            <a style="color:white;" href="http://www.sena.edu.co/es-co/sena/Paginas/directorio.aspx" target="_blank">Resto del país sedes y horarios</a><br>
            Atención telefónica: lunes a viernes 7:00 a.m. a 7:00 p.m. - sábados 8:00 a.m. a 1:00 p.m.<br>
            Atención al ciudadano: Bogotá (57 1) 3430111 - Línea gratuita y resto del país 018000 910270 <br>
            Atención al empresario: Bogotá (57 1) 3430101 - Línea gratuita y resto del país 018000 910682<br>
            <a href="http://sciudadanos.sena.edu.co/SolicitudIndex.aspx" target="_blank" style="color: #FFFFFF">PQRS</a> --
            <a href="http://www.sena.edu.co/es-co/ciudadano/Paginas/chat.aspx" target="_blank" style="color: #FFFFFF">Chat en línea</a> --
            Correo notificaciones judiciales: servicioalciudadano@sena.edu.co<br>
            Todos los derechos 2024 SENA - <a href="http://www.sena.edu.co/es-co/Paginas/politicasCondicionesUso.aspx" target="_blank" style="color: #FFFFFF">Políticas de privacidad y condiciones uso Portal Web SENA</a> --
            <a href="http://www.sena.edu.co/es-co/transparencia/Documents/proteccion_datos_personales_sena_2016.pdf" target="_blank" style="color: #FFFFFF">Política de Tratamiento para Protección de Datos Personales</a> - 
            <a href="http://compromiso.sena.edu.co/index.php?text=inicio&amp;id=27" target="_blank" style="color:#FFFFFF">Política de seguridad y privacidad de la información</a>
        </div>
    </div>
</body>
</html>
