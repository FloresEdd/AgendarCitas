<?php
require "db/conexion.php";

//get the information from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    
   //verify the type of user
    $tipoUsuario = ""; //variable to save the type of user
    $sql = "SELECT tipo FROM usuarios WHERE nombre = '$nombre' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $tipoUsuario =['tipo'];
    }
    
    //search in the thable depending on the type of user
    if ($tipoUsuario == "admin") {
        //query to search in the table of admins
        $sqlAdmin = "SELECT * FROM admin WHERE nombre = '$nombre' AND password = '$password'";
        $resultAdmin = mysqli_query($conn, $sqlAdmin);
        
        if ($resultAdmin && mysqli_num_rows($resultAdmin) > 0) {
        }
        //if the result is true, redirect to index admin
        header ("Location: index_admin.php");
        exit();
    } else {
        //query to search in the table of users
        $sqlUsuario = "SELECT * FROM usuarios WHERE nombre = '$nombre' AND password = '$password'";
        $resultUsuario = mysqli_query($conn, $sqlUsuario);
        
        if ($resultUsuario && mysqli_num_rows($resultUsuario) > 0) {
            //if the result is true, redirect to index user
        }
        header ("Location: index_user.php");
        exit();
    }
    
   //if the user is not found show an error message
    echo "Usuario no encontrado";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Página de inicio de sesión</title>
</head>
<body>
    <h1>Iniciar sesión</h1>

    <form method="POST" action="inicio_sesion.php">
        <label for="nombre">Usuario:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Iniciar sesión">

    </form>
</body>
</html>