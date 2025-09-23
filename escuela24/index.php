<?php
require_once "clases.php";

// Si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alumno = new Alumno($_POST['nombre'], $_POST['apellido']);
    $alumno->setDni($_POST['dni']);
    $alumno->setFechaN($_POST['fechaN']);
    $alumno->alta();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cargar Alumno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- ✅ Importante para móvil -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .form-container {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px; /* en PC no pasa de 400px */
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #bbb;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #007bff;
            color: white;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }

        a {
            display: block;
            margin-top: 15px;
            text-align: center;
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        /* ✅ Responsive */
        @media (max-width: 600px) {
            .form-container {
                padding: 15px;
            }
            input[type="text"],
            input[type="date"],
            input[type="submit"] {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Formulario Alta de Alumno</h2>
        <form method="POST" action="">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Apellido:</label>
            <input type="text" name="apellido" required>

            <label>DNI:</label>
            <input type="text" name="dni" required>

            <label>Fecha de Nacimiento:</label>
            <input type="date" name="fechaN" required>

            <input type="submit" value="Guardar Alumno">
        </form>
        <a href="listado.php">📋 Ver listado de alumnos</a>
    </div>
</body>
</html>
