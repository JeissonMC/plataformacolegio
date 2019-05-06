<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<div class="modal fade" id="addprofesor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Nuevo Docente</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="Add/add_docente.php" id="registrodocentes">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Cedula:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Cedula" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Nombres:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Nombre" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Apellido:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Apellido" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Profesión:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Profesion" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Dirección:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Direccion" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Telefono:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Telefono" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Materias:</label>
					</div>
					<div class="col-sm-10">
						<select id="Materias" class="selectpicker" data-width="100%" multiple title="Seleccione Materia" name="Materias"  multiple data-actions-box="true">
                            <option value="Matematicas">Matematicas</option>
                            <option value="Ingles">Ingles</option>
                            <option value="Sociales">Sociales</option>
                            <option value="Biologia">Biologia</option>
                            <option value="Quimica"v>Quimica</option>
                            <option value="Espanol">Espanol</option>
                            <option value="Geometria">Geometria</option>

                        </select>

					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Cursos:</label>
					</div>
					<div class="col-sm-10">
						<select class="selectpicker" data-width="100%" multiple title="Seleccione Cursos"   multiple data-actions-box="true" name="Cursos">

                            <option value="6A">6A</option>
                            <option value="7A">7A</option>
                            <option value="8A">8A</option>
                            <option value="9A">9A</option>
                            <option value="10B">10B</option>
                            <option value="11A">11A</option>
                        </select>

					</div>

				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Usuario:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Usuario" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Clave:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Clave" required>
					</div>
				</div>


            </div>
			</div>
            <div class="modal-footer">
            	 <input type="hidden" name="hidden_docentes" id="hidden_docentes" />
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</a>
			</form>
            </div>

        </div>
    </div>
</div>

<script>
$(document).ready(function(){
 $('.selectpicker').selectpicker();

$('#Materias').change(function(){
  $('#hidden_docentes').val($('#Materias').val());
 });

$('#registrodocentes').on('add', function(event){
  event.preventDefault();
  if($('#Materias').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"Add/add_docente.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     //console.log(data);
     $('#hidden_docentes').val('');
     $('.selectpicker').selectpicker('val', '');
     alert(data);
    }
   })
  }
  else
  {
   alert("Por favor selecciones materias");
   return false;
  }
 });
});


</script>

 <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/js/bootstrap-select.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/js/i18n/defaults-*.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
