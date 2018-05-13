@extends('layouts.master')
@section('breadcrumb','Área')
@section('content')
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Lista de Áreas</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="tableAreas" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Código</th>
                <th>Área</th>
                <th>Ícono</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
@endsection
@section('script')
<script>

    var dataAreas;

    $(document).ready(function() {
        getDataAreas();
    } );

    function initTableAreas()
    {
        $('#tableAreas').DataTable( {
            data: dataAreas,
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'icon' },
            ]
         } );
    }

    function getDataAreas()
    {
        $.ajax({
            dataType: 'json',
            url: 'getAllAreas',
        }).done(function(data) {
            dataAreas = data;
            console.log('dataAreas:',dataAreas);
            initTableAreas();
        });
    }
</script>
@endsection
