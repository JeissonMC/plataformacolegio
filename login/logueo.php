<?php 


require '../Conexion/connection.php';

session_start();


$Usuario = $_POST['Usuario']; 
$Clave = $_POST['Clave'];

$q = "SELECT COUNT(*) as contar  FROM docentes WHERE Usuario = '$Usuario' and Clave = '$Clave'";
$consulta = mysqli_query($conn,$q);
$array = mysqli_fetch_array($consulta);

if ($array['contar'] > 0) {


	header("location: ../asistencia.php");
}

else{

echo "datos incorrectos";

}

 ?>