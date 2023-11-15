<?php
require "db/conexion.php";
// Registro de un nuevo usuario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $tipo = $_POST["tipo"];

    // Insertar el usuario en la base de datos
    $sql = "INSERT INTO usuarios (nombre, email, password, tipo) VALUES ('$nombre', '$email', '$password', '$tipo')";
    // Ejecutar la consulta SQL
    // confirmation message
    if (mysqli_query($conn, $sql)) {
        echo "¡Registro exitoso!";
    } else {
        echo "Error al registrar el usuario: " . mysqli_error($conn);
    }
    header ("Location: inicio_sesion.php");
}
?>
<form action="registro_usuarios.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br><br>
  
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="tipo">Tipo:</label>
    <select id="tipo" name="tipo">
        <option value="admin">Administrador</option>
        <option value="user">Usuario</option>
    </select><br><br>

    <input type="submit" value="Registrar">
</form>
