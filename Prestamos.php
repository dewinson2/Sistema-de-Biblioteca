<?php 
include 'db.php';
$sql = "SELECT id, id_cliente, id_libro, fecha_prestamo, fecha_devolucion FROM prestamo";
$result = $conn->query($sql);

?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamos Registrados</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(45deg, #2C3E50, #4CA1AF);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }

        @keyframes gradientBG {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 40px auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        h2 {
            color: #FFFFFF;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            color: #FFFFFF;
        }

        th {
            background-color: rgba(255, 255, 255, 0.2);
            font-weight: 600;
        }

        tr {
            background-color: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: scale(1.02);
        }

        button {
            background: linear-gradient(45deg, #3498db, #2ecc71);
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        button:active {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
   
        .navbar {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .nav-logo {
            color: #FFFFFF;
            font-size: 1.5rem;
            font-weight: 600;
            text-decoration: none;
        }

        .nav-menu {
            display: flex;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .nav-item {
            margin-left: 1.5rem;
        }

        .nav-link {
            color: #FFFFFF;
            text-decoration: none;
            font-weight: 400;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: #3498db;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: #3498db;
            visibility: hidden;
            transform: scaleX(0);
            transition: all 0.3s ease-in-out;
        }

        .nav-link:hover::after {
            visibility: visible;
            transform: scaleX(1);
        }

        .content {
            padding: 2rem;
            color: #FFFFFF;
        }

        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
            }

            .nav-menu {
                margin-top: 1rem;
            }

            .nav-item {
                margin-left: 0;
                margin-right: 1rem;
            }
        }







    </style>
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
        <h2>Prestamos Registrados</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>ID del Cliente</th>
                <th>ID del libro</th>
                <th>Fecha prestamos</th>
                <th>Fecha devolucion</th>
               
                <th>Acción</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                // Salida de datos de cada fila
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["id_cliente"] . "</td>";
                    echo "<td>" . $row["id_libro"] . "</td>";
                    echo "<td>" . $row["fecha_prestamo"] . "</td>";
                    echo "<td>" . $row["fecha_devolucion"] . "</td>";
                  
                    echo "<td>        
                            <form action='actualizar_prestamo.php' method='GET'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <input type='hidden' name='titulo' value='{$row['id_cliente']}'>
                                <input type='hidden' name='autor' value='{$row['id_libro']}'>
                                <input type='hidden' name='isbn' value='{$row['fecha_prestamo']}'>
                                <input type='hidden' name='numero_edicion' value='{$row['fecha_devolucion']}'>
                                <button type='submit' name='actualizar'>Editar</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No hay clientes registrados</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>