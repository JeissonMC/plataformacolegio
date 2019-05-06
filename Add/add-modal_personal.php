<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Nuevo Registro</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="Add/add_personal.php">
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
						<label class="control-label modal-label">Nombre:</label>
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
						<label class="control-label modal-label">Fecha:</label>
					</div>
					<div class="col-sm-10">
						<input type="date" class="form-control" name="Fecha" required>
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
						<label class="control-label modal-label">Motivo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Moivo" required>
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
