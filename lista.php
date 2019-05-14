<?php
$mysqli = new mysqli("Localhost", "root", "", "colegio");
if ($mysqli->connect_error) {
    exit('Could not connect');
}

$sql = "SELECT  ID ,Nombre, Apellido FROM alumnos WHERE Curso = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($ID, $Nombre, $Apellido);

echo "<h3>Lista de alumnos</h3><br><div class='row'>
            <div class='col-md-12'>
            <form action=''>";
echo "<table class='table table-hover'>
    <thead>
<tr>
<th scope='col'>Documento</th>
<th scope='col'>Nombre y Apellido</th>
<th scope='col' style='
    text-align: center;
''>Asistencia</th>
<th></th>
<th scope='col' style='
    text-align: center;
''>Jornada Unica</th>
<th></th>
<th scope='col'>Observaciones</th>
<th></th>

</tr>

    </thead>"

;

if ($stmt->num_rows > 0) {
    $i = 0;
    while ($stmt->fetch()) {

        echo "<tbody>";
        echo "<tr>";
        echo "
        <td>" . $ID . "
        <td>" . $Nombre . " " . $Apellido . "</td>
        <td>
            <input class='form-check-input rasiatencia' type='radio' id='blabla" . $i . "' name='lsasito" . $i . "'>
            <label class='form-check-label' for='blabla" . $i . "'>
                Asistio
            </label>
        </td>
        <td>
            <input class='form-check-input rasiatencia' type='radio' id='blas" . $i . "' name='lsasito" . $i . "'>
            <label class='form-check-label' for='blas" . $i . "'>
                No Asistio
            </label>
        </td>
        <td>
            <input class='form-check-input ralmorzo' type='radio' id='almurzla" . $i . "' name='lalmuero" . $i . "'>
            <label class='form-check-label' for='almurzla" . $i . "'>
                Si  Almorzo
            </label>
        </td>
        <td>
            <input class='form-check-input ralmorzo' type='radio' id='almurzlano" . $i . "' name='lalmuero" . $i . "'>
            <label class='form-check-label' for='almurzlano" . $i . "'>
                No Almorzo
            </label>
        </td>
        <td>
</td>



  </tr>";
        $i += 1;
    }
    echo "</tbody></table>";
    echo "</form></div><div  class='col-md-12'><button type='button' name='Guardar' class='btn btn-outline-success' onclick='sendasistent();'>Guardar</button></div>";
}

$stmt->close();
