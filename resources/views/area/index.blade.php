@extends('layouts.master')
@section('breadcrumb1','Configuración')
@section('breadcrumb2','Área')
@section('content')
@include('area.create')
    <button type="button" onclick="openModalArea(1)" class="btn btn-success">
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
         tableAreas =  $('#tableAreas').DataTable( {
                        destroy: true,
                        data: dataAreas,
                        columns: [
                            { data: 'id' },
                            { data: 'name' },
                            { data: 'icon' },
                            { data: null, defaultContent: "<button class ='btnDeleteArea btn btn-danger btn-xs' title='Eliminar' ><span class='fa fas fa-trash'></span></button>\n\
                                                           <button onclick='openModalArea(2)' class ='btnShowArea btn btn-primary btn-xs' title='Actualizar'><span class='fa fas fa-edit'></button>"
                            }
                        ],
                        "columnDefs": [
                            {
                                "targets": [ 0 ],
                                "visible": false
                            }
                        ]
                    } );

        $('#tableAreas tbody').on( 'click', '.btnShowArea', function () {
            rowArea = tableAreas.row($(this).parents('tr') ).data();
            console.log('rowAreaSelected:', rowArea);
            $('#name').val(rowArea['name']);
            $('#icon').val(rowArea['icon']);
        });
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

    $("#btnCreateArea").click(function() {

        $.ajax({
            dataType: 'json',
            type:'POST',
            url: "area",
            data: $("#formArea").serialize(),
        }).done(function(data){        
            swal('¡Bien!', 'Registro agregado', 'success')
            getDataAreas();
            closeModal();
        });
    });


    $("#btnUpdateArea").click(function() {

        $.ajax({
            dataType: 'json',
            type:'PUT',
            url: "area/"+rowArea['id'],
            data: $("#formArea").serialize(),
        }).done(function(data){
            console.log("result update:",data);
            swal('¡Bien!', 'Registro actualizado', 'success')
            getDataAreas();
            closeModal();
        });
    });


    $('#tableAreas tbody').on( 'click', '.btnDeleteArea', function () {

        var rowArea = tableAreas.row($(this).parents('tr') ).data();
        swal({
                title: '¿Está seguro?',
                text: "El registro será eliminado",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar'
                }).then((result) => {                                  
                if (result.value)
                {
                    $.ajax({
                            headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                                dataType: 'json',
                                type:'DELETE',
                                url: "area/"+rowArea['id'],
                            }).done(function(data){
                                console.log("result delete:",data);                                
                                getDataAreas();
                            });

                    swal('¡Registro eliminado!', '¡Éxito!', 'success')
                }
            })
    });

    function resetModal()
    {
        $('#formArea').trigger("reset");
    }

    function closeModal()
    {
        $('#modalArea').modal('hide');
    }

    function openModalArea(action)
    {
        if(action == 1)
        {
            resetModal();
            $("#btnUpdateArea").hide();
            $("#btnCreateArea").show();
            $(".modal-title").text("Crear Área");
        }
        else
        {
            $("#btnUpdateArea").show();
            $("#btnCreateArea").hide();
            $(".modal-title").text("Actualizar Área");
        }
        $('#modalArea').modal('show');
    }

</script>
@endsection
