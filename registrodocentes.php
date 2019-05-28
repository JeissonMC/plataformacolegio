<?php

$conn = mysqli_connect("localhost","root","","colegio");
require_once('PHPExcel/php-excel-reader/excel_reader2.php');
require_once('PHPExcel/spreadsheet-reader/SpreadsheetReader.php');

if (isset($_POST["import"]))
{
    
    
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $Cedula = "";
                if(isset($Row[0])) {
                    $Cedula = mysqli_real_escape_string($conn,$Row[0]);
                }
                
                $Nombre = "";
                if(isset($Row[1])) {
                    $Nombre = mysqli_real_escape_string($conn,$Row[1]);
                }

                 $Apellido = "";
                if(isset($Row[2])) {
                    $Apellido = mysqli_real_escape_string($conn,$Row[2]);
                }
                 $Profesion = "";
                if(isset($Row[3])) {
                    $Profesion = mysqli_real_escape_string($conn,$Row[3]);
                }
                 
                 $Direccion = "";
                if(isset($Row[4])) {
                    $Direccion = mysqli_real_escape_string($conn,$Row[4]);
                }

                 $Telefono = "";
                if(isset($Row[5])) {
                    $Telefono = mysqli_real_escape_string($conn,$Row[5]);
                }

                 $Materias = "";
                if(isset($Row[6])) {
                    $Materias = mysqli_real_escape_string($conn,$Row[6]);
                }

                $Cursos = "";
                if(isset($Row[7])) {
                    $Cursos = mysqli_real_escape_string($conn,$Row[7]);
                }
                
                if (!empty($Cedula) || !empty($Nombre)  || !empty($Apellido) ||!empty($Profesion)||!empty($Direccion) || !empty($Telefono ) || !empty($Materias) || !empty($Cursos)) {
                    $query = "insert into docentes(Cedula, Nombre, Apellido,Profesion, Direccion, Telefono, Materias,Cursos) values('".$Cedula."','".$Nombre."','".$Apellido."','".$Profesion."','".$Direccion."','".$Telefono."','".$Materias."','".$Cursos."')";
                    $result = mysqli_query($conn, $query);
                
                    if (! empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modulo Docentes</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
	<style>
		.height10{
			height:10px;
		}
		.mtop10{
			margin-top:10px;
		}
		.modal-label{
			position:relative;
			top:7px
		}
		table,td,th,a,h1{

			font-family: 'Courgette', cursive;
		}
	</style>
</head>
<body >
<div class="container">
	<div class="row">
		  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <center><h1 class="display-4">Modulo Docentes</h1></center>

  </div>
</div>

			</div>
			  <div class="col-sm-12 ml-auto" style="margin-left: 800px;" >

				 	<a href="#addprofesor" data-toggle="modal" class="btn btn-primary"  ><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
				 	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Importarexcel">
                         Importar
                     </button>

				<a href="alumno_pdf.php" target="_blank" class="btn btn-success "><span class="glyphicon glyphicon-print"></span> PDF</a>
				<a href="http://localhost/IEGME/" data-toggle="modal" class="btn btn-danger" >Regresar</a>


			</div>
			<div class="row">
				 <div class="col-sm-12">
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>Cedula</th>
						<th>Nombre</th>
						<th>Apellido</th>
                        <th>Profesion</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
						<th>Materias</th>
						<th>Cursos</th>
						<th>Acciones</th>
					</thead>
					<tbody>
						<?php
include_once 'Conexion/connection.php';
$sql = "SELECT * FROM docentes";

//use for MySQLi-OOP
$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
    echo
        "<tr>
			<td>" . $row['Cedula'] . "</td>
			<td>" . $row['Nombre'] . "</td>
			<td>" . $row['Apellido'] . "</td>
			<td>" . $row['Profesion'] . "</td>
			<td>" . $row['Direccion'] . "</td>
			<td>" . $row['Telefono'] . "</td>
			<td>" . $row['Materias'] . "</td>
			<td>" . $row['Cursos'] . "</td>
			<td>
				<a href='#editdocentes_" . $row['id'] . "' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Editar</a>
				<a href='#delete_" . $row['id'] . "' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Eliminar</a>
			</td>
		</tr>";
    include 'Edit/edit_delete_modal_docentes.php';
}

?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
</div>

<div class="modal fade" id="Importarexcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Importar archivo de excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 <form method="post" action="" enctype="multipart/form-data" role="form" name="frmExcelImport">
  <div>

      <input type="file" name="file"  id="file" placeholder="Archivo (.xlsx)">
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="submit"  name="import" class="btn btn-primary">Importar Datos</button>
       </div>

    </div>
  </div>
</div>
  </form>




</body>
<?php include 'Add/add-modal_docente.php'?>

<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<script src="datatable/buttons/dataTables.buttons.min.js"></script>
<script src="datatable/buttons/jszip.min.js"></script>
<script src="datatable/buttons/pdfmake.min.js"></script>
<script src="datatable/buttons/vfs_fonts.js"></script>
<script src="datatable/buttons/buttons.html5.min.js"></script>





<script>
$(document).ready(function(){

    $('#myTable').DataTable({
    	 dom: 'Bfrtip',
        buttons: [

            'excelHtml5',

        ],

    	"language":{
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
    });

    //hide alert
    $(document).on('click', '.close', function(){
    	$('.alert').hide();
    })
});
</script>
</body>
</html>