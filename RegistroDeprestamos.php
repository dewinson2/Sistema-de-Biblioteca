<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $id_libro = $_POST['id_libro'];
    $fecha_prestamo = $_POST['fecha_prestamo'];
    $fecha_devolucion = $_POST['fecha_devolucion'];

    // Verificar si el libro está disponible (estado=1)
    $sql = "SELECT estado FROM libro WHERE id = '$id_libro'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['estado'] == 1) {
            // Si el libro está disponible, registrar el préstamo
            $sql = "INSERT INTO prestamo (id_cliente, id_libro, fecha_prestamo, fecha_devolucion) 
                    VALUES ('$id_cliente', '$id_libro', '$fecha_prestamo', '$fecha_devolucion')";

            if ($conn->query($sql) === TRUE) {
                // Actualizar el estado del libro a 'prestado' (estado=0)
                $sql_update = "UPDATE libro SET estado = 0 WHERE id = '$id_libro'";
                $conn->query($sql_update);

                echo "Nuevo préstamo registrado con éxito";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "El libro no está disponible para préstamo";
        }
    } else {
        echo "No se encontró el libro con ID: $id_libro";
    }

    $conn->close();
}
?>





<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Préstamos</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="#" class="nav-logo">Sistema de Biblioteca</a>
            <ul class="nav-menu">
            <li class="nav-item"><a href="tabla.php" class="nav-link">Libros</a></li>
                <li class="nav-item"><a href="Prestamos.php" class="nav-link">Préstamos</a></li>
                <li class="nav-item"><a href="clientes.php" class="nav-link">Clientes</a></li>
                <li class="nav-item"><a href="Registros.php" class="nav-link">Registros</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="form-container">
            <h2>Registrar Préstamo</h2>
            <form action="RegistroDeprestamos.php" method="post">
                <label for="id_cliente">ID Cliente</label>
                <input type="text" id="id_cliente" name="id_cliente" required placeholder="Ingrese ID del cliente">
                
                <label for="id_libro">ID Libro</label>
                <input type="text" id="id_libro" name="id_libro" required placeholder="Ingrese ID del libro">
                
                <label for="fecha_prestamo">Fecha Préstamo</label>
                <input type="date" id="fecha_prestamo" name="fecha_prestamo" required>
                
                <label for="fecha_devolucion">Fecha Devolución</label>
                <input type="date" id="fecha_devolucion" name="fecha_devolucion">
                
                <input type="submit" value="Registrar Préstamo">
            </form>
        </div>
    </div>
</html>