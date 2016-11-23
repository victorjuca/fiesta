<div class="modal fade" id="modalActualizaImagen" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span>Imagen</span></h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form role="form">

                    <label class="btn btn-default btn-file">
                        <input type="file" file-model="categoria.imagen">
                    </label>
                    <button type="button" class="btn btn-success btn-block" ng-click='actualizaImagen()'>Actualiza Imagen</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default btn-default " data-dismiss="modal"></span> Salir</button>
            </div>
        </div>
    </div>
</div>