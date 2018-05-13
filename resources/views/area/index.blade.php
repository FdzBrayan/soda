@extends('layouts.master')
@section('breadcrumb','Área')
@section('content')
@include('area.create')
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCreateArea">
        Nueva
    </button><br><br>
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
                <th>Opción</th>
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
            destroy: true,
            data: dataAreas,
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'icon' },
                { data: null, defaultContent: "<button class ='btn btn-danger btn-xs'><span class='fa fas fa-trash'></span></button>\n\
                                               <button data-toggle='modal' href='#modalCreateArea' class ='btn btn-primary btn-xs' ><span class='fa fas fa-edit'></button>"
                }

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

    $("#btnCreateArea").click(function(e) {

        e.preventDefault();

        $.ajax({
            dataType: 'json',
            type:'POST',
            url: "area",
            data: $("#formArea").serialize(),
        }).done(function(data){
            getDataAreas();
        });
    });

</script>
@endsection
