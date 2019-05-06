<?php
session_start();
include_once '../Conexion/connection.php';

if (isset($_GET['ID'])) {
    $sql = "DELETE FROM alumnos WHERE ID = '" . $_GET['ID'] . "'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Alumno eliminado con éxito.';
    } else {
        $_SESSION['error'] = 'Algo salió mal al eliminar Alumno.';
    }
} else {
    $_SESSION['error'] = 'Seleccionar Alumno para eliminar primero.';
}

header('location: ../registroalumnos.php');
