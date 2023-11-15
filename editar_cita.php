<!DOCTYPE html>
<html>
<head>
    <title>Editar Cita</title>
    <meta charset="UTF-8">
    <h2 align="center">Editar Citas</h2>
    <!-- Agregar estilos CSS adicionales aquí -->
</head>
<body>
</body>
</html>
<?php
require "db/conexion.php";

//check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //get the values from the form
    $nuevo_motivo = $_POST["nuevo_motivo"];
    $nuevo_nombreperson = $_POST["nuevo_nombreperson"];
    $nueva_fecha = $_POST["nueva_fecha"];
    $nueva_hora = $_POST["nueva_hora"];
    $nuevo_lugar = $_POST["nuevo_lugar"];
    

    //update the data in the database
    $query = "UPDATE citas SET cita = '$nuevo_motivo', nombreperson = '$nuevo_nombreperson', fecha = '$nueva_fecha', hora = '$nueva_hora', lugar = '$nuevo_lugar'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        //the data was updated
        echo "Los datos se actualizaron correctamente";
    } else {
        //there was an error to update the data
        echo "Hubo un error al actualizar los datos";
    }
    
    exit();
}


//get the data from the database
$sql = "SELECT * FROM citas";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // Recorrer los datos de la cita y mostrarlos
    while ($row = mysqli_fetch_assoc($result)) {
        // Obtener los valores de la cita
        $cita = $row["cita"];
        $nombreperson = $row["nombreperson"];
        $fecha = $row["fecha"];
        $hora = $row["hora"];
        $lugar = $row["lugar"];
        echo "<h3>Cita:</h3>";
        echo "<p>$cita</p>";
        echo "<h3>Nombre de la persona:</h3>";
        echo "<p>$nombreperson</p>";
        echo "<h3>Fecha:</h3>";
        echo "<p>$fecha</p>";
        echo "<h3>Hora:</h3>";
        echo "<p>$hora</p>";
        echo "<h3>Lugar:</h3>";
        echo "<p>$lugar</p>";

        // Add a form to update the cita data
        echo "<h3>Actualizar cita:</h3>";
        echo "<form action='editar_cita.php' method='POST'>";
        echo "<input type='text' name='nuevo_motivo' placeholder='Nuevo motivo'>";
        echo "<input type='text' name='nuevo_nombreperson' placeholder='Nuevo nombre de la persona'>";
        echo "<input type='date' name='nueva_fecha' placeholder='Nueva fecha'>";
        echo "<input type='time' name='nueva_hora' placeholder='Nueva hora'>";
        echo "<input type='text' name='nuevo_lugar' placeholder='Nuevo lugar'>";
        echo "<input type='submit' value='Actualizar'>";
        echo "</form>";
    }
} else {
    //dont find the data
    echo "No se encontraron datos de la cita";
}
?>