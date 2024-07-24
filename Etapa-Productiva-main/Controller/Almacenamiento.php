<?php
include '../Controller/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $programa = $_POST['programa'];
    $fic_id = $_POST['fic_id'];
    $fecha_inicio_ficha = $_POST['fecha_inicio_ficha'];
    $fecha_fin_ficha = $_POST['fecha_fin_ficha'];
    $nombre = $_POST['nombre'];
    $tipo_id = $_POST['tipo_id'];
    $num_id = $_POST['num_id'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $municipio = $_POST['municipio'];
    $correo = $_POST['correo'];
    $telefono_contacto = $_POST['telefono_contacto'];
    $otros_telefonos = $_POST['otros_telefonos'];
    $eps = $_POST['eps'];
    $vinculo = $_POST['tipo_vinculo'];


    
    $checkQuery = "SELECT COUNT(*) FROM aprendiz WHERE num_id = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("s", $num_id);
    $checkStmt->execute();
    $checkStmt->bind_result($count);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($count > 0) {
        
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
            Swal.fire({
                title: 'Error',
                text: 'El número de documento ya existe.',
                icon: 'error',
                confirmButtonText: 'Continuar'
            }).then(() => {
                window.history.back(); // Volver a la página anterior
            });
            </script>
        </body>
        </html>";
    } else {
        // Insertar el nuevo registro
        $sql = "INSERT INTO aprendiz (programa, fic_id, fecha_inicio_ficha, fecha_fin_ficha, nombre, tipo_id, num_id, fecha_nacimiento, direccion, municipio, correo, telefono_contacto, otros_telefonos, eps, tipo_vinculo)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssssssss", $programa, $fic_id, $fecha_inicio_ficha, $fecha_fin_ficha, $nombre, $tipo_id, $num_id, $fecha_nacimiento, $direccion, $municipio, $correo, $telefono_contacto, $otros_telefonos, $eps, $vinculo);

        if ($stmt->execute()) {
            echo "<!DOCTYPE html>
            <html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
                <script>
                Swal.fire({
                    title: '¡Éxito!',
                    text: 'Aprendiz agregado exitosamente.',
                    icon: 'success',
                    confirmButtonText: 'Continuar'
                }).then(() => {
                    window.location.href = '../view/FormularioAprendiz.php'; // Redirige a la página deseada
                });
                </script>
            </body>
            </html>";
        } else {
            echo "<!DOCTYPE html>
            <html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
                <script>
                Swal.fire({
                    title: 'Error',
                    text: 'Error: " . $conn->error . "',
                    icon: 'error',
                    confirmButtonText: 'Continuar'
                }).then(() => {
                    window.history.back(); // Volver a la página anterior en caso de error
                });
                </script>
            </body>
            </html>";
        }
    }

    $conn->close();
}
?>

