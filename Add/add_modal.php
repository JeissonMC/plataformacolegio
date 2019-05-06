<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Nuevo Alumno</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="Add/add.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Codigo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Codigo" required>
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
						<label class="control-label modal-label">Edad:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Edad" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Curso:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Curso" required>
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
						<label class="control-label modal-label">Dirección:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Direccion" required>
					</div>
				</div>
            </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</a>
			</form>
            </div>

        </div>
    </div>
</div>
