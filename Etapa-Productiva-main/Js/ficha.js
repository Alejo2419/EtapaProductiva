function updateFichaInfo() {
    var select = document.getElementById('fic_id');
    var selectedValue = select.value;

    if (fichaInfo[selectedValue]) {
        document.getElementById('programa').value = fichaInfo[selectedValue]['programa'];
        document.getElementById('fecha_inicio_ficha').value = fichaInfo[selectedValue]['fecha_inicio_ficha'];
        document.getElementById('fecha_fin_ficha').value = fichaInfo[selectedValue]['fecha_fin_ficha'];
    } else {
        document.getElementById('programa').value = '';
        document.getElementById('fecha_inicio_ficha').value = '';
        document.getElementById('fecha_fin_ficha').value = '';
    }
}