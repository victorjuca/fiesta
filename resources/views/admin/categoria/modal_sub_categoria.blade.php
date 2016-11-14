<div class="modal fade" id="modalCrud" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span> Mensaje</span></h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form role="form">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input id="nombre" class="form-control" ng-model="categoria.nombre"/>
                    </div>
                    <button type="button" class="btn btn-success btn-block" ng-click='crudCategoria()'>Guardar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default btn-default " data-dismiss="modal"></span> Salir</button>
            </div>
        </div>
    </div>
</div>