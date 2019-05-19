<?php

$mysqli = new mysqli('localhost', 'root', '', 'colegio');

session_start();

?>
<!DOCTYPE>
<html lang="en">

<head>
  <title>Asistencia</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/css/bootstrap-select.min.css">
  <style>
    textarea {
      resize: none;
      height: 70px;
    }

    table tr th {
      text-align: center;
    }

    table tr td {
      text-align: center;
    }
  </style>

</head>

<body style="
    background-color: #EFF8FB;
">
  <div class="col-md-12">

    <center>
      <H2 class="lead" style="font-size: 36px">MODULO DE ASISTENCIA</H2>
    </center>
  </div>

  <br><br>

  <div class="container" style="
    max-width: 700;background: white;
">
    <br><br><br>
    <div class="row"></div>
    <div class="col-sm-12" style="height: 70px;">

      <input type="date" name="Fecha" id="fecharegis" class="form-control" require>
    </div>
    <div class="col-sm-12" style="height:70px;">
      <select id="materias" class="selectpicker" title="Seleccione Materia" data-width="100%">
        <option value="0">Seleccione una materia:</option>
        <?php
$query = $mysqli->query("SELECT * FROM materias");
while ($valores2 = mysqli_fetch_array($query)) {
    echo '<option value="' . $valores2[id] . '">' . $valores2[Nombre] . '</option>';
}
?>
      </select>
    </div>
    <div class="col-sm-12" style="height:70px;">
      <input type="text" class="form-control" id="cod_docente" aria-describedby="emailHelp"
        placeholder="Cedula Profesor" require>
    </div>
    <div class="col-sm-12" style="height:130px;">
      <form action="">
        <div class="form-group">
          <select id="grados" class="selectpicker" data-width="100%" name="customers"
            onchange="showestudiantes(this.value)">
            <option value="">Seleccione grado</option>
            <option value="6A">6A</option>
            <option value="7A ">7A</option>
            <option value="8A ">8A</option>
            <option value="9B ">9B</option>
            <option value="10A ">10A</option>
            <option value="11A ">11A</option>
          </select>
        </div>

      </form>
      <br>
    </div>
  </div>
  </div>
  <div class="lead">
    <center>
      <div id="txtHint" class="col-md-12">Seleccione grado para la toma de asistencia</div>
    </center>

  </div>


  </div>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/js/bootstrap-select.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/js/i18n/defaults-*.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.0.js"></script>


  <script>
    function showestudiantes(str) {
      var xhttp;
      if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
      }
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "lista.php?q=" + str, true);
      xhttp.send();
    }
    //funcion para insertar la asistencia

    function sendasistent() {

      var alumno,materias, grados;
      var fecha = $("#fecharegis").val();
      var cporfer = $("#cod_docente").val();
      $("#materias option:selected").each(function () {
        materias = $(this).text();
      });
      $("#grados option:selected").each(function () {
        grados = $(this).text();
      });


      $("tbody tr").each(function () {
        var asitencia = 0;
        var almuzo = 0;
        var obsrvachion;
        $(this).find(".alumno").each(function () {
          alumno = $(this).text();
        });
        $(this).find(".obsevation").each(function () {
          obsrvachion = $(this).val();
        });
        $(this).find(".rasiatencia").each(function () {
          if ($(this).prop("checked")) {
            var ids = $(this).attr("id");
            if (ids.match(/blabla/)) {
              asitencia = 1;
            }
          }
          if ($(this).prop("checked")) {
            var ids = $(this).attr("id");
            if (ids.match(/almurzla/)) {
              almuzo = 1;
            }
          }
        });

        var parametros = {
          "asistencia": asitencia,
          "almorzzo": almuzo,
          "fecha": fecha,
          "materia": materias,
          "grado": grados,
          "profe": cporfer,
          "alumno": alumno,
          "observaciones": obsrvachion
        };
        console.log(parametros);
        $.ajax({
          url: "asistencia.php",
          type: "post",
          data: parametros,
          success: function (data) {
            if(data){

              
            }else{

            }
          },
          error: function () {

          }
        });
      });
    }
  </script>
<?php
if (isset($_POST['asistencia'])) {
  require 'Conexion/connection.php';
  $asistencia    = $_POST['asistencia'];
  $almorzo    = $_POST['almorzzo'];
  $fecha  = $_POST['fecha'];
  $materia = $_POST['materia'];
  $curso = $_POST['grado'];
  $profesor  = $_POST['profe'];
  $estudiante    = $_POST['alumno'];
  $observacion   = $_POST['observaciones'];




  $sql = "INSERT INTO asistencia (Fecha, Materia, Cedula, Grado, nombrecompleto, Asistio, Jornada, Obervacion) VALUES ('$fecha','$materia',' $profesor',' $curso',' $estudiante',' $asistencia',' $almorzo',' $observacion')";

  if ($conn->query($sql)) {
     echo true;
  } else {
      echo false;
  }
}
?>
</body>

</html>