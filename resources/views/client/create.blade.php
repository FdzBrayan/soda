<div class="modal" id="modalClient" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Crear Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container">
        <form id="formArea">
        {!! csrf_field() !!}
          <div class="form-group row">
            <label for="first_name" class="col-sm-2 col-form-label col-form-label-sm">Primer nombre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-sm" name="first_name" id="first_name" placeholder="Primer nombre">
            </div>
          </div>
          <div class="form-group row">
            <label for="second_name" class="col-sm-2 col-form-label col-form-label-sm">Segundo nombre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-sm" name="second_name" id="second_name" placeholder="Segundo nombre">
            </div>
          </div>
          <div class="form-group row">
            <label for="first_lastname" class="col-sm-2 col-form-label col-form-label-sm">Primer apellido</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-sm" name="first_lastname" id="first_lastname" placeholder="Primer apellido">
            </div>
          </div>
          <div class="form-group row">
            <label for="second_lastname" class="col-sm-2 col-form-label col-form-label-sm">Segundo apellido</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-sm" name="second_lastname" id="second_lastname" placeholder="Segundo apellido">
            </div>
          </div>
          <div class="form-group row">
            <label for="nickname" class="col-sm-2 col-form-label col-form-label-sm">Apodo</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-sm" name="nickname" id="nickname" placeholder="Apodo">
            </div>
          </div>
        </form>
      </div>
      </div>
      <div class="modal-footer">
        <button id="btnCreateArea"type="button" class="btn btn-primary">Crear</button>
        <button id="btnUpdateArea"type="button" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>