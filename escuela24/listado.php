<?php
$conexion = new mysqli("localhost", "root", "", "escuela24");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$sql = "SELECT matricula, nombre, apellido, dni, fechaN FROM alumno ORDER BY matricula ASC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Alumnos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- ✅ Importante para móvil -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            padding: 20px;
            max-width: 1000px;
            margin: auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow-x: auto;
            display: block; /* ✅ Hace scroll horizontal en móvil */
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #007bff;
            color: white;
        }

        tr:hover {
            background: #f1f1f1;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-primary {
            background: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        /* ✅ Responsive */
        @media (max-width: 768px) {
            th, td {
                padding: 8px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            th, td {
                padding: 6px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>📋 Listado de Alumnos</h2>
        <table>
            <tr>
                <th>Matrícula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Fecha de Nacimiento</th>
            </tr>
            <?php
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>
                            <td>{$fila['matricula']}</td>
                            <td>{$fila['nombre']}</td>
                            <td>{$fila['apellido']}</td>
                            <td>{$fila['dni']}</td>
                            <td>{$fila['fechaN']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay alumnos cargados.</td></tr>";
            }
            ?>
        </table>

        <div style="text-align:center; margin-top:15px;">
            <a href="index.php" class="btn btn-primary">➕ Cargar nuevo alumno</a>
        </div>
    </div>
</body>




</html>

<?php
$conexion->close();
?>
