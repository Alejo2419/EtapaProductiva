<?php
include '../Controller/conexion.php';

$resultmunicipio = mysqli_query ($conn,"SELECT * FROM municipio");
$optionsmunicipio = "";
while ($row = mysqli_fetch_assoc($resultmunicipio)) {
    $optionsmunicipio .= "<option value='{$row['id']}'>{$row['municipio']}</option>";
}
