<?php
session_start();
include_once '../Conexion/connection.php';

if (isset($_POST['add'])) {
    $Codigo    = $_POST['Codigo'];
    $Nombre    = $_POST['Nombre'];
    $Apellido  = $_POST['Apellido'];
    $Edad      = $_POST['Edad'];
    $Curso     = $_POST['Curso'];
    $Telefono  = $_POST['Telefono'];
    $Direccion = $_POST['Direccion'];

    $sql = "INSERT INTO alumnos (Codigo,Nombre, Apellido, Edad,Curso,Telefono,Direccion) VALUES ('$Codigo','$Nombre','$Apellido', '$Edad','$Curso','$Telefono','$Direccion')";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Datos almacenados correctamente';
    } else {
        $_SESSION['error'] = 'Algo salió mal al agregar el registro';
    }
} else {
    $_SESSION['error'] = 'Rellena el formulario de agregar primero';
}

header('location: ../registroalumnos.php');
