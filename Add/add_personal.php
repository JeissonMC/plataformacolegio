<?php
session_start();
include_once '../Conexion/connection.php';

if (isset($_POST['add'])) {
    $Cedula   = $_POST['Cedula'];
    $Nombre   = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Fecha    = $_POST['Fecha'];
    $Telefono = $_POST['Telefono'];
    $Moivo    = $_POST['Moivo'];

    $sql = "INSERT INTO registroexterno (Cedula,Nombre, Apellido,Fecha,Telefono,Moivo) VALUES ('$Cedula','$Nombre','$Apellido', '$Fecha','$Telefono','$Moivo')";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Datos almacenados correctamente';
    } else {
        $_SESSION['error'] = 'Algo salió mal al agregar el registro';
    }
} else {
    $_SESSION['error'] = 'Rellena el formulario de agregar primero';
}

header('location: personalexterno.php');
