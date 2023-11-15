<?php
require "db/conexion.php";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the details of the cita from the form
    $nombre = $_POST["nombreperson"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $lugar = $_POST["lugar"];
    $motivo = $_POST["cita"];

    $query = "INSERT INTO citas (cita, nombreperson, fecha, hora, lugar) VALUES ('$motivo', '$nombre', '$fecha', '$hora', '$lugar')";
    $result = mysqli_query($conn, $query);

    // Check if the insertion was successful
    if ($result) {
        // Redirect to success.php
        header("Location: success.php");
        exit;
    } else {
        // Redirect to error.php
        header("Location: error.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cita</title>
</head>

<body>
    <h1>Agregar Cita</h1>

    <form method="POST" action="agregar_cita.php">
        <label for="motivo">Motivo:</label>
        <input type="text" name="cita" id="cita" required>
        <br><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombreperson" id="nombreperson" required>
        <br><br>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" required>
        <br><br>

        <label for="hora">Hora:</label>
        <input type="time" name="hora" id="hora" required>
        <br><br>

        <label for="lugar">Lugar:</label>
        <input type="text" name="lugar" id="lugar" required>
        <br><br>

        <input type="submit" value="Guardar">
    </form>
</body>

</html>