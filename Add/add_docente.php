<?php
session_start();
include_once '../Conexion/connection.php';

if (isset($_POST['add'])) {
    $Cedula    = $_POST['Cedula'];
    $Nombre    = $_POST['Nombre'];
    $Apellido  = $_POST['Apellido'];
    $Profesion = $_POST['Profesion'];
    $Direccion = $_POST['Direccion'];
    $Telefono  = $_POST['Telefono'];
    $Materias  = $_POST['Materias'];
    $Cursos    = $_POST['Cursos'];
    $Usuario   = $_POST['Usuario'];
    $Clave     = $_POST['Clave'];

    $sql = "INSERT INTO docentes (Cedula, Nombre, Apellido, Profesion, Direccion, Telefono, Materias, Cursos, Usuario, Clave) VALUES ('$Cedula','$Nombre',' $Apellido',' $Profesion',' $Direccion',' $Telefono',' $Materias',' $Cursos',' $Usuario ',' $Clave')";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Datos almacenados correctamente';
    } else {
        $_SESSION['error'] = 'Algo salió mal al agregar el registro';
    }
} else {
    $_SESSION['error'] = 'Rellena el formulario de agregar primero';
}

header('location: ../registrodocentes.php');
