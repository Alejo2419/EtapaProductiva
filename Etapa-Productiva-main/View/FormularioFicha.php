<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../AlternativaProductiva/CSS/Alternativa.css">
    <link rel="shortcut icon" href="../AlternativaProductiva/Img/favicon.ico" type="image/x-icon">
    <title>ALTERNATIVA ETAPA PRODUCTIVA</title>
</head>
<body>
<div class="title-container">
        <h1>ALTERNATIVA ETAPA PRODUCTIVA</h1>
    </div>
    <div class="section"><form action="Almacenamiento_Ficha.php" method="post">
        <label for="programa">Programa de formación:</label>
        <input type="text" id="programa" name="programa" required><br><br>

        <label for="fic_id">Número de Ficha:</label>
        <input type="text" id="fic_id" name="fic_id" required><br><br>

        <label for="fecha_inicio_ficha">Fecha de inicio de la ficha:</label>
        <input type="date" id="fecha_inicio_ficha" name="fecha_inicio_ficha" required><br><br>

        <label for="fecha_fin_ficha">Fecha de finalización de la ficha:</label>
        <input type="date" id="fecha_fin_ficha" name="fecha_fin_ficha" required><br><br>

        <input class="button" type="submit" value="Agregar Ficha">
    </form></div>
    <div>
    <!-- Formulario para filtrar por número de ficha -->
<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="numero_ficha">Número de Ficha:</label>
    <input type="text" id="numero_ficha" name="numero_ficha">
    <input class="button" type="submit" value="Filtrar">
</form>
</div>
<div>
<table class="table">
    <tr>
        <th>Número de Ficha</th>
        <th>Nombre y apellidos del aprendiz</th>
        <th>Tipo de identificación</th>
        <th>Número de identificación</th>
        <th>Fecha de Nacimiento</th>
        <th>Dirección de residencia</th>
        <th>Municipio de residencia</th>
        <th>Correo electrónico institucional</th>
        <th>Teléfono de contacto</th>
        <th>Otros teléfonos de contacto</th>
        <th>EPS a la que está afiliado</th>
        <th>Tipo de vínculo</th>
    </tr>

    <?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formulario_aprendiz";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Inicializar la variable para el número de ficha
    $numero_ficha = "";

    // Verificar si se ha enviado un número de ficha desde el formulario
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $numero_ficha = $_GET['numero_ficha'];
    }

    // Consulta SQL para obtener los datos de los aprendices (con filtro opcional por número de ficha)
    $sql = "SELECT * FROM tabla_aprendices";
    if (!empty($numero_ficha)) {
        $sql .= " WHERE fic_id = ?";
    }

    // Preparar la consulta
    $stmt = $conn->prepare($sql);

    // Vincular el parámetro del número de ficha si se proporciona
    if (!empty($numero_ficha)) {
        $stmt->bind_param("s", $numero_ficha);
    }

    // Ejecutar la consulta
    $stmt->execute();
    $result = $stmt->get_result();

    // Mostrar los datos en la tabla
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['fic_id'] . "</td>";
            echo "<td>" . $row['nombre_apellidos'] . "</td>";
            echo "<td>" . $row['tipo_identificacion'] . "</td>";
            echo "<td>" . $row['numero_identificacion'] . "</td>";
            echo "<td>" . $row['fecha_nacimiento'] . "</td>";
            echo "<td>" . $row['direccion_residencia'] . "</td>";
            echo "<td>" . $row['municipio_residencia'] . "</td>";
            echo "<td>" . $row['correo_institucional'] . "</td>";
            echo "<td>" . $row['telefono_contacto'] . "</td>";
            echo "<td>" . $row['otros_telefonos'] . "</td>";
            echo "<td>" . $row['eps_afiliado'] . "</td>";
            echo "<td>" . $row['tipo_vinculo'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "No hay datos disponibles";
    }

    // Cerrar conexión
    $stmt->close();
    $conn->close();
    ?>
    </table>
</div>
</body>
<footer>
    <div class="more-information">
                Servicio Nacional de Aprendizaje SENA - Dirección General<br>
                Calle 57 No. 8 - 69 Bogotá D.C. (Cundinamarca), Colombia<br>
                Conmutador Nacional (57 1) 5461500 - Extensiones<br>
                Atención presencial: lunes a viernes 8:00 a.m. a 5:30 p.m.<br>
                <a style="color:white;" href="http://www.sena.edu.co/es-co/sena/Paginas/directorio.aspx" target="_blank">Resto del país sedes y horarios</a><br>
                Atención telefónica: lunes a viernes 7:00 a.m. a 7:00 p.m. - <br>sábados 8:00 a.m. a 1:00 p.m.<br>
                Atención al ciudadano: Bogotá (57 1) 3430111 - Línea gratuita y resto del país 018000 910270<br>
                Atención al empresario: Bogotá (57 1) 3430101 - Línea gratuita y resto del país 018000 910682<br>
                <a href="http://sciudadanos.sena.edu.co/SolicitudIndex.aspx" target="_blank" style="color: #FFFFFF">PQRS</a><br>
                <a href="http://www.sena.edu.co/es-co/ciudadano/Paginas/chat.aspx" target="_blank" style="color: #FFFFFF">Chat en línea</a><br>
                Correo notificaciones judiciales: servicioalciudadano@sena.edu.co<br>
                Todos los derechos 2024 SENA - <a href="http://www.sena.edu.co/es-co/Paginas/politicasCondicionesUso.aspx" target="_blank" style="color: #FFFFFF">Políticas de privacidad y condiciones uso Portal Web SENA</a><br>
                <a href="http://www.sena.edu.co/es-co/transparencia/Documents/proteccion_datos_personales_sena_2016.pdf" target="_blank" style="color: #FFFFFF">Política de Tratamiento para Protección de Datos
                    Personales</a> - <a href="http://compromiso.sena.edu.co/index.php?text=inicio&amp;id=27" target="_blank" style="color:#FFFFFF"><br>Política de seguridad y privacidad de la
                    información</a>
    </div>
</footer>
</html>
