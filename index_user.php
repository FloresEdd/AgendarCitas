<!DOCTYPE html>
<html>

<head>
    <h1 align="center">BIENVENIDO!</h1>
    <meta charset="utf-8">
    <title>Gestor de Citas</title>
</head>

<body>
    <h1 align="center">Lista de Citas</h1><br>
    <table align="center" border="1">
        <tr>
            <th>Motivo</th>
            <th>ID</th>
            <th>Nombre del Paciente</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Lugar</th>
            <th>Acciones</th>
        </tr>
        <?php
        // Fetch citas data from database
        function getCitas()
        {
            require "db/conexion.php";
            $query = "SELECT * FROM citas";
            $result = mysqli_query($conn, $query);

            // Process the result and store it in an array
            $citas = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $citas[] = $row;
            }

            // Return the citas array
            return $citas;
        }


        $citas = getCitas();
        // Loop through citas and display them in table rows
        foreach ($citas as $cita) {
            echo "<tr>";
            echo "<td>" . $cita['cita'] . "</td>";
            echo "<td>" . $cita['id'] . "</td>";
            echo "<td>" . $cita['nombreperson'] . "</td>";
            echo "<td>" . $cita['fecha'] . "</td>";
            echo "<td>" . $cita['hora'] . "</td>";
            echo "<td>" . $cita['lugar'] . "</td>";
            echo "<td>";
            echo "<a href='editar_cita.php?id=" . $cita['id'] . "'>Editar</a> | ";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
<h1 align="center">¿Deseas agregar una cita?</h1><br>
<h2 align="center">
    <a href="agregar_cita.php">Si, agregar</a>
</h2>
</form>
</body>

</html>