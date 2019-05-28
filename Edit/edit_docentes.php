<?php
session_start();
include_once '../Conexion/connection.php';

if (isset($_POST['edit_docentes'])) {
    $ID        = $_POST['id'];
    $Nombre    = $_POST['Nombre'];
    $Apellido  = $_POST['Apellido'];
    $Profesion = $_POST['Profesion'];
    $Direccion = $_POST['Direccion'];
    $Telefono  = $_POST['Telefono'];
    $Materias  = $_POST['Materias'];
    $Cursos    = $_POST['Cursos'];
    $sql = "UPDATE docentes SET Nombre = '$Nombre', Apellido = '$Apellido', Profesion = '$Profesion', Direccion = '$Direccion', Telefono = '$Telefono', Materias = '$Materias', Cursos = '$Cursos' WHERE id = '$id'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Registro actualizado correctamente.';
    } else {
        $_SESSION['error'] = 'Algo salió mal al actualizar docentes.';
    }
} else {
    $_SESSION['error'] = 'Selecciona un docentes para editarlo.';
}

header('location: ../registrodocentes.php');
