<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modulo externo</title>
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
	<h1 class="page-header text-center">Registro personal externo</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="row">
			<?php
if (isset($_SESSION['error'])) {
    echo
        "
					<div class='alert alert-danger text-center'>
						<button class='close'>&times;</button>
						" . $_SESSION['error'] . "
					</div>
					";
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    echo
        "
					<div class='alert alert-success text-center'>
						<button class='close'>&times;</button>
						" . $_SESSION['success'] . "
					</div>
					";
    unset($_SESSION['success']);
}
?>
			</div>

			</div>
			<div class="row">
				 <div class="col align-self-end">

				 	<a href="#addnew" data-toggle="modal" class="btn btn-primary"  style="margin-left: -43px;"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>

				<a href="pdfexterno.php" target="_blank" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> PDF</a>
				<a href="http://localhost/IEGME/" data-toggle="modal" class="btn btn-danger" >Regresar</a><br><br>

				 </div>
			</div>
			<div class="row">
				 <div class="col-sm-12">
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>Cedula</th>
						<th>Nombre</th>
						<th>Apellido</th>
                        <th>Telefono</th>
						<th>Fecha</th>
						<th>Motivo</th>

					</thead>
					<tbody>
						<?php
include_once 'Conexion/connection.php';
$sql = "SELECT * FROM registroexterno";

//use for MySQLi-OOP
$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
    echo
        "<tr>
									<td>" . $row['Cedula'] . "</td>
									<td>" . $row['Nombre'] . "</td>
									<td>" . $row['Apellido'] . "</td>
									<td>" . $row['Telefono'] . "</td>
									<td>" . $row['Fecha'] . "</td>
									<td>" . $row['Moivo'] . "</td>

								</tr>";

}

?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
</div>

</body>
<?php include 'Add/add-modal_personal.php'?>

<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<!-- generate datatable on our table -->
<script>
$(document).ready(function(){
	//inialize datatable
    $('#myTable').DataTable({

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