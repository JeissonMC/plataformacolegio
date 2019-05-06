<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Institucion</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


	<style>


		h3, a,button{

			font-family: 'Courgette', cursive;
		}
	</style>


	<section class="events-ins">
		<div class="container-fluid">
			 <center><img src="assets/gallery/SIA.PNG" alt="IMG" class="img-responsive img-rounded"></center>




			<br><br>
			<div class="row">
				<!--======================================== Articulo 1 ========================================-->
				<article class="col-xs-3 col-md-3">
					<div class="thumbnail">
				      <img src="assets/gallery/descarga.png" alt="IMG" class="img-responsive img-rounded">
				      <div class="caption">
				        <h3 class="text-center">Registro de Alumnos</h3>
				        <p class="text-center"><a href="registroalumnos.php" class="btn btn-primary" role="button">Ingresar</a></p>
				      </div>
				    </div>
				</article>

				<article class="col-xs-3 col-md-3">
					<div class="thumbnail">
				      <img src="assets/gallery/docente.png" alt="IMG" class="img-responsive img-rounded">
				      <div class="caption">
				        <h3 class="text-center">Registro de Docentes</h3>
				        <p class="text-center"><a href="registrodocentes.php" class="btn btn-primary" role="button">Ingresar</a></p>
				      </div>
				    </div>
				</article>
				<!--======================================== Articulo 2 ========================================-->
				<article class="col-xs-3 col-md-3">
					<div class="thumbnail">
				      <img src="assets/gallery/Acceso1.png" alt="IMG" class="img-responsive img-rounded">
				       <h3 class="text-center">Asistencia y Observaciones</h3>
				      <div class="caption">

				        <p class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login">Ingresar</button>
				        	<a href="asistencia.php" class="btn btn-danger">asistencia</a>

				      </div>

				    </div>
				</article>
				<!--======================================== Articulo 3 ========================================-->

				<article class="col-xs-3 col-md-3">
					<div class="thumbnail">
				      <img src="assets/gallery/Docentes.png" alt="IMG" class="img-responsive img-rounded">
				       <h3 class="text-center">Ingreso/Salida de personal particular</h3>
				      <div class="caption">

				        <p class="text-center"><a href="personalexterno.php" class="btn btn-primary" role="button">Ingresar</a></p>
				      </div>
				    </div>
				</article>


				<article class="col-xs-3 col-md-3">
					<div class="thumbnail">
				      <img src="assets/gallery/Estadistica.png" alt="IMG" class="img-responsive img-rounded">
				      <div class="caption">
				        <h3 class="text-center">Estadisticas</h3>

				        <p class="text-center"><a href="#" class="btn btn-primary" role="button">Ingresar</a></p>
				      </div>
				    </div>
				</article>
			</div>

		</div>
	</section>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">INICIAR SESION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="kt-form" action="">
				<div class="kt-portlet__body">
					<div class="form-group validated">
						 <input type="text" class="form-control is-valid" id="validationServer01" placeholder="Usuario" required>
      <div class="valid-feedback">
        Bien!
      </div>
					</div>
					<div class="form-group validated">

						<input type="password" class="form-control is-invalid" id="inputWarning1" placeholder="Contraseña">
						<div class="invalid-feedback">Algo esta mal.</div>

					</div>
				</div>

			</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success">Ingresar</button>
      </div>
    </div>
  </div>
</div>
</body>


<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
