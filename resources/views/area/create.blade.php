<div class="modal" id="modalCreateArea" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Crear Área</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container">
        <form id="formArea">
        {!! csrf_field() !!}
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Área</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="área">
            </div>
          </div>
          <div class="form-group row">
            <label for="icon" class="col-sm-2 col-form-label col-form-label-sm">Ícono</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-sm" name="icon" id="icon" placeholder="Ícono">
            </div>
          </div>
        </form>
      </div>
      </div>
      <div class="modal-footer">
        <button id="btnCreateArea"type="button" class="btn btn-primary">Crear</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>