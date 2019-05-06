<?php
$mysqli = new mysqli("Localhost", "root", "", "colegio");
if ($mysqli->connect_error) {
    exit('Could not connect');
}

$sql = "SELECT  Nombre, Apellido FROM alumnos WHERE Curso = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($Nombre, $Apellido);

echo "<h3>Lista de alumnos</h3><br><div class='row'>
            <div class='col-md-12'>
            <form action=''>";
echo "<table class='table table-hover'>
    <thead>
<tr>
<th scope='col'>Nombre y Apellido</th>
<th scope='col'>Acciones</th>
<th></th>

</tr>

    </thead>


    "

;

if ($stmt->num_rows > 0) {

    while ($stmt->fetch()) {
        echo "<tbody>
";
        echo "<tr>";
        echo "<td>" . $Nombre . " " . $Apellido . "</td>
        <td><input class='form-check-input' type='radio'><label class='form-check-label' for='exampleRadios1'>
    Asistio
  </label></td><td><input class='form-check-input' type='radio'><label class='form-check-label' for='exampleRadios1'>
    No Asistio
  </label></td></tr>";

    }
    echo "</tbody></table>";
    echo "</form></div><div  class='col-md-12'><button type='button' name='Guardar' class='btn btn-outline-success'>Guardar</button></div>";
}

$stmt->close();
