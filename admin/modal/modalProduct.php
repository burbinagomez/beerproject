<div class="modal fade bd-example-modal-lg" id="crearProducto" tabindex="-1" role="dialog"
    aria-labelledby="crearProducto" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Crear Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="main-card mb-3 card">
                <div class="card-body">
                    
                    <form class="">
                        <div class="position-relative row form-group"><label for="exampleEmail"
                                class="col-sm-2 col-form-label">Producto</label>
                            <div class="col-sm-10"><input name="producto" id="producto" placeholder="" type="text"
                                    class="form-control"></div>
                        </div>
                        <div class="position-relative row form-group"><label for="examplePassword"
                                class="col-sm-2 col-form-label">Precio</label>
                            <div class="col-sm-10"><input name="precio" id="precio" placeholder=" "
                                    type="number" class="form-control"></div>
                        </div>
                        <div class="position-relative row form-group"><label for="examplePassword"
                                class="col-sm-2 col-form-label">Stock</label>
                            <div class="col-sm-10"><input name="stock" id="stock" placeholder=" "
                                    type="number" class="form-control"></div>
                        </div>
                        <div class="position-relative row form-group"><label for="exampleFile"
                                class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10"><input name="file" id="exampleFile" type="file"
                                    class="form-control-file">
                                <small class="form-text text-muted">This is some placeholder block-level help text
                                    for the above input. It's a bit lighter and easily wraps to a new line.</small>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>