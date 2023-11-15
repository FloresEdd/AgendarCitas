<?php
    function mostrarCitasDisponibles() {
        require "db/conexion.php";
        // Conexión a la base de datos
        // Verificar la conexión
        if (!$conn) {
            die("Error al conectar con la base de datos: " . mysqli_connect_error());
        }

        // Obtener las citas disponibles
        $sql = "SELECT * FROM citas";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Mostrar las citas disponibles
            echo "<h2>Citas Disponibles:</h2>";
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>{$row['fecha']} - {$row['hora']}</li>";
            }
            echo "</ul>";
        } else {
            echo "No hay citas disponibles";
        }

        // Cerrar la conexión
        mysqli_close($conn);
    }

    function mostrarOpcionEliminarCita() {
        require "db/conexion.php";
        echo "<h3>¿Desea eliminar una cita?</h3>";
        echo "<form action=\"eliminar_cita.php\" method=\"post\">";
        echo "<label for=\"id\">ID de la cita:</label>";
        echo "<input type=\"text\" id=\"id\" name=\"id\">";
        echo "<input type=\"submit\" value=\"Eliminar\">";
        echo "</form>";
        //close the cnnection
        $conn->close();
    }

    
   

// Llamada a la función eliminarCita con el id de la cita a eliminar
mostrarCitasDisponibles();

// Llamada a la función mostrarOpcionEliminarCita
mostrarOpcionEliminarCita();
    

?>
