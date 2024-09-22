<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros - Sistema de Biblioteca</title>
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
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        h1 {
            color: #FFFFFF;
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 600;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 40px rgba(31, 38, 135, 0.5);
        }

        .card-link {
            text-decoration: none;
            color: #FFFFFF;
            font-weight: 500;
            font-size: 1.2rem;
        }

        .card-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
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

            .grid {
                grid-template-columns: 1fr;
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
        <h1>Registros</h1>
        <div class="grid">
            <a href="devolucion.php" class="card card-link">
                <div class="card-icon">📚</div>
                <div>Registrar Devolución</div>
            </a>
            <a href="registroDeLibro.php" class="card card-link">
                <div class="card-icon">📖</div>
                <div>Registrar Libro</div>
            </a>
            <a href="create.php" class="card card-link">
                <div class="card-icon">👤</div>
                <div>Registrar Cliente</div>
            </a>
            <a href="RegistroDeprestamos.php" class="card card-link">
                <div class="card-icon">🔄</div>
                <div>Registrar Préstamo</div>
            </a>
        </div>
    </div>
</body>
</html>