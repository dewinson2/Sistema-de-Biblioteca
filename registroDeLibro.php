
<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $isbn = $_POST['isbn'];
    $numero_edicion = $_POST['numero_edicion'];
    $costo_diario_mora = $_POST['costo_diario_mora'];

    $sql = "INSERT INTO libro (titulo, autor, isbn, numero_edicion, costo_diario_mora) VALUES ('$titulo', '$autor', '$isbn', '$numero_edicion', '$costo_diario_mora')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo libro registrado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>












<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Libro</title>
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

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 80px);
        }

        .form-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
            width: 100%;
            max-width: 400px;
            animation: fadeIn 0.8s forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            color: #FFFFFF;
            margin-bottom: 2rem;
            text-align: center;
            font-weight: 600;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 0.5rem;
            color: #FFFFFF;
            font-weight: 500;
        }

        input[type="text"] {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border: none;
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.25);
            color: #FFFFFF;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        input[type="text"]::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        input[type="text"]:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.2);
        }

        input[type="submit"] {
            background: linear-gradient(45deg, #3498db, #2ecc71);
            color: white;
            padding: 1rem;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"]:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        input[type="submit"]:active {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

            .form-container {
                padding: 2rem;
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
               

                <li class="nav-item"><a href="create.php" class="nav-link">Clientes</a></li>
              
                <li class="nav-item"><a href="Registros.php" class="nav-link">Registros</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="form-container">
            <h2>Registrar Libro</h2>
            <form action="registroDeLibro.php" method="post">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required placeholder="Ingresa el título">
                
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" required placeholder="Ingresa el ISBN">

                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" required placeholder="Ingresa el autor">
                
                <label for="numero_edicion">Número de Edición:</label>
                <input type="text" id="numero_edicion" name="numero_edicion" required placeholder="Ingresa el número de edición">
                
                <label for="costo_diario_mora">Costo Diario de Mora:</label>
                <input type="text" id="costo_diario_mora" name="costo_diario_mora" required placeholder="Ingresa el costo diario de mora">
                
                <input type="submit" value="Registrar">
            </form>
        </div>
    </div>
</body>
</html>








    
</body>







</html>
