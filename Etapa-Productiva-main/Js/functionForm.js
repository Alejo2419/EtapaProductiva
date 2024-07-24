// function_form.js

function remplazarFormulario() {
    var aprendizContainer = document.getElementById('aprendiz-container');
    aprendizContainer.innerHTML = `
        <h2>Inicio de Sesión para Funcionarios</h2>
        <form action="" method="post">
            <label for="username">Usuario:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input class="boton" type="submit" value="Iniciar Sesión"><br><br>
        </form>
        <br><br>
        <button class="boton" onclick="restoreAprendiz()">Volver</button>
    `;
}

function restoreAprendiz() {
    var aprendizContainer = document.getElementById('aprendiz-container');
    aprendizContainer.innerHTML = `
        <h1>Aprendiz</h1>
        <img src="./Img/alumnos.jpeg" width="250px"><br>
        <a href="./View/FormularioAprendiz.php"><button class="boton">Registrarse</button></a> <br>
    `;
}
