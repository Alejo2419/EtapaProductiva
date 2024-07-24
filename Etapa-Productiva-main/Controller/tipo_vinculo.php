<?php
include '../Controller/conexion.php';

$resultvin = mysqli_query ($conn,"SELECT * FROM tipo_vinculo");
$optionsVinculo = "";
while ($row = mysqli_fetch_assoc($resultvin)) {
    $optionsVinculo .= "<option value='{$row['id']}'>{$row['descripcion']}</option>";
}
