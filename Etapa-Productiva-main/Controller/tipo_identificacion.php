<?php

include '../Controller/conexion.php';

$resultDoc = mysqli_query ($conn,"SELECT * FROM tipo_identificacion");
$optionsDocum = "";
while ($row = mysqli_fetch_assoc($resultDoc)) {
    $optionsDocum .= "<option value='{$row['id']}'>{$row['descripcion']}</option>";
}



