<?php
include '../Controller/conexion.php';
$resultFicha = mysqli_query($conn, "SELECT * FROM ficha_formacion");
$optionsFicha = "";
$infoFicha = [];

while ($row = mysqli_fetch_assoc($resultFicha)) {
    $optionsFicha .= "<option value='{$row['id']}'>{$row['fic_id']}</option>";
    $infoFicha[$row['id']] = [
        'programa' => $row['programa'],
        'fecha_inicio_ficha' => $row['fecha_inicio_ficha'],
        'fecha_fin_ficha' => $row['fecha_fin_ficha']
    ];
}
?>
<script>
    var fichaInfo = <?php echo json_encode($infoFicha); ?>;
</script>
