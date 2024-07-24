<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $programa = $_POST['programa'];
    $fic_id = $_POST['fic_id'];
    $fecha_inicio_ficha = $_POST['fecha_inicio_ficha'];
    $fecha_fin_ficha = $_POST['fecha_fin_ficha'];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formulario_aprendiz";

    // Conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL preparada con marcadores de posición
    $sql = "INSERT INTO ficha_formacion (programa, fic_id, fecha_inicio_ficha, fecha_fin_ficha) VALUES (?, ?, ?, ?)";
    
    // Preparar la consulta
    $stmt = $conn->prepare($sql);
    
    // Vincular valores a los marcadores de posición y ejecutar la consulta
    if ($stmt &&
        $stmt->bind_param("ssss", $programa, $fic_id, $fecha_inicio_ficha, $fecha_fin_ficha) &&
        $stmt->execute()) {
        echo "Ficha Agregada exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar conexión
    $stmt->close();
    $conn->close();
}
?>
