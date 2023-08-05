<div id="modalmantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="usuario_form">
                <div class="modal-header">
                    <h4 class="modal-title" id="mdltitulo"></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="usu_id" name="usu_id">

                    <div class="form-group">
                        <label class="form-label" for="usu_nom">Nombre</label>
                        <input type="text" class="form-control" id="usu_nom" name="usu_nom" placeholder="Ingrese Nombre" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="usu_user">Usuario</label>
                        <input type="text" class="form-control" id="usu_user" name="usu_user" placeholder="Ingrese Usuario" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="usu_pass">Contraseña</label>
                        <input type="password" class="form-control" id="usu_pass" name="usu_pass" placeholder="Ingrese Contraseña" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="usu_correo">Correo</label>
                        <input type="email" class="form-control" id="usu_correo" name="usu_correo" placeholder="Ingrese Correo" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>