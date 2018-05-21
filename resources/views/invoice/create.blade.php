<div class="modal" id="modalInvoice" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registrar Factura</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form id="formInvoice" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group row">
              <label for="description" class="col-sm-2 col-form-label col-form-label-sm">Descripción</label>
              <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="description" id="description" placeholder="Descripción">
              </div>
            </div>
            <div class="form-group row">
              <label for="amount" class="col-sm-2 col-form-label col-form-label-sm">Monto</label>
              <div class="col-sm-10">
                <input type="numeric" class="form-control form-control-sm" name="amount" id="amount" placeholder="Monto">
              </div>
            </div>
            <div class="form-group row">
              <label for="date" class="col-sm-2 col-form-label col-form-label-sm">Fecha</label>
              <div class="col-sm-10">
                <input type="date" class="form-control form-control-sm" name="date" id="date" placeholder="Fecha">
              </div>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="image" id="image">
              <label class="custom-file-label" for="image">Subir imagen</label>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="btnCreateInvoice" type="submit" class="btn btn-primary">Crear</button>
        <button id="btnUpdateInvoice" type="button" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>