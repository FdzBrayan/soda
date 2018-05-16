@extends('layouts.master')
@section('breadcrumb','Cliente')
@section('content')
@include('client.create')
    <button type="button" onclick="openModalCliente(1)" class="btn btn-success">
        Nueva
    </button><br><br>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Lista de Clientes</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="tableClientes" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Código</th>
                <th>Código Área</th>
                <th>Nombre</th>
                <th>Seg. nombre</th>
                <th>Apellido</th>
                <th>Seg. Apellido</th>
                <th>Apodo</th>
                <th>Opción</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection

@section('script')
<script>
    var dataClientes;

    $(document).ready(function() {
        getDataClientes();
    } );

    function initTableClientes()
    {
         tableClientes =  $('#tableClientes').DataTable( {
                        destroy: true,
                        data: dataClientes,
                        columns: [
                            { data: 'id' },
                            { data: 'area.name' },
                            { data: 'first_name' },
                            { data: 'second_name' },
                            { data: 'nickname' },
                            { data: 'first_lastname' },
                            { data: 'second_lastname' },
                            { data: null, defaultContent: "<button class ='btnDeleteCliente btn btn-danger btn-xs' title='Eliminar' ><span class='fa fas fa-trash'></span></button>\n\
                                                           <button onclick='openModalCliente(2)' class ='btnShowCliente btn btn-primary btn-xs' title='Actualizar'><span class='fa fas fa-edit'></button>"
                            }
                        ]
                    } );

      /*  $('#tableClientes tbody').on( 'click', '.btnShowCliente', function () {
            rowArea = tableAreas.row($(this).parents('tr') ).data();
            console.log('roClienteSelected:', rowArea);
            //$('#name').val(rowArea['name']);
            //$('#icon').val(rowArea['icon']);
        });*/
    }

    function getDataClientes()
    {
        $.ajax({
            dataType: 'json',
            url: 'getAllClients',
        }).done(function(data) {
            dataClientes = data;
            console.log('dataClientes:',dataClientes);
            initTableClientes();
        });
    }
/*
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
*/
    function resetModal()
    {
        $('#formCliente').trigger("reset");
    }

    function closeModal()
    {
        $('#modalClient').modal('hide');
    }

    function openModalCliente(action)
    {
      
        if(action == 1)
        {
            resetModal();
            $("#btnUpdateCliente").hide();
            $("#btnCreateCliente").show();
           /* $(".modal-title").text("Crear Área");*/
        }
        else
        {
            $("#btnUpdateCliente").show();
            $("#btnCreateCliente").hide();
         /*   $(".modal-title").text("Actualizar Área");*/
        }
        $('#modalArea').modal('show');
    }

</script>
@endsection
