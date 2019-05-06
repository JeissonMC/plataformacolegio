<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modulo Alumnos</title>
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
    <center><h1 class="display-4">Modulo Alumnos</h1></center>

  </div>

			</div>
			 <div class="col-sm-12 ml-auto" style="margin-left: 800px;" >

				 	<a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
				 	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Importarexcel">
                         Importar
                     </button>

				<a href="alumno_pdf.php" target="_blank" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> PDF</a>
				<a href="http://localhost/IEGME/" data-toggle="modal" class="btn btn-danger" >Regresar</a>

				 </div>

			<div class="row">
				 <div class="col-sm-12">
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>Codigo</th>
						<th>Nombre</th>
						<th>Apellido</th>
                        <th>Edad</th>
                        <th>Curso</th>
                        <th>Telefono</th>
						<th>Dirección</th>
						<th>Acciones</th>
					</thead>
					<tbody>
						<?php
include_once 'Conexion/connection.php';
$sql = "SELECT * FROM alumnos";

//use for MySQLi-OOP
$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
    echo
        "<tr>
									<td>" . $row['Codigo'] . "</td>
									<td>" . $row['Nombre'] . "</td>
									<td>" . $row['Apellido'] . "</td>
									<td>" . $row['Edad'] . "</td>
									<td>" . $row['Curso'] . "</td>
									<td>" . $row['Telefono'] . "</td>
									<td>" . $row['Direccion'] . "</td>
									<td>
										<a href='#edit_" . $row['ID'] . "' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Editar</a>
										<a href='#delete_" . $row['ID'] . "' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Eliminar</a>
									</td>
								</tr>";
    include 'Edit/edit_delete_modal.php';
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
 <form method="post" action="import.php" enctype="multipart/form-data" role="form">
  <div>

      <input type="file" name="name"  id="name" placeholder="Archivo (.xlsx)">
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Importar Datos</button>
       </div>

    </div>
  </div>
</div>
  </form>




</body>
<?php include 'Add/add_modal.php'?>

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