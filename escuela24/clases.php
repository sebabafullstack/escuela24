<?php
class Alumno {
    // Atributos privados
    private $nombre;
    private $apellido;
    private $dni;
    private $fechaN;

    // Constructor (recibe nombre y apellido obligatorios)
    public function __construct($nombre, $apellido) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    // Setters para completar los demás datos
    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function setFechaN($fechaN) {
        $this->fechaN = $fechaN;
    }

    // Método alta() para guardar en la BD
    public function alta() {
        // Conexión a la BD
        $conexion = new mysqli("localhost", "root", "", "escuela24");

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $sql = "INSERT INTO alumno (nombre, apellido, dni, fechaN) 
                VALUES (?, ?, ?, ?)";

        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssss", $this->nombre, $this->apellido, $this->dni, $this->fechaN);

        if ($stmt->execute()) {
            echo " Alumno cargado correctamente.";
        } else {
            echo " Error al cargar el alumno: " . $stmt->error;
        }

        $stmt->close();
        $conexion->close();
    }
}
?>
