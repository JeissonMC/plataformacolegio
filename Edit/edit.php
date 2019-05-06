<?php
session_start();
include_once '../Conexion/connection.php';

if (isset($_POST['edit'])) {
    $ID        = $_POST['ID'];
    $Nombre    = $_POST['Nombre'];
    $Apellido  = $_POST['Apellido'];
    $Edad      = $_POST['Edad'];
    $Curso     = $_POST['Curso'];
    $Telefono  = $_POST['Telefono'];
    $Direccion = $_POST['Direccion'];
    $sql       = "UPDATE alumnos SET Nombre = '$Nombre', Apellido = '$Apellido', Edad = '$Edad', Curso = '$Curso', Telefono = '$Telefono', Direccion = '$Direccion' WHERE ID = '$ID'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Registro actualizado correctamente.';
    } else {
        $_SESSION['error'] = 'Algo salió mal al actualizar alumno.';
    }
} else {
    $_SESSION['error'] = 'Selecciona un alumno para editarlo.';
}

header('location: ../registroalumnos.php');
