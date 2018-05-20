@extends('layouts.master')
@section('breadcrumb1','Configuración')
@section('breadcrumb2','Cliente')
@section('content')
@include('client.create')
    <button type="button" onclick="openModalCliente(1)" class="btn btn-success">
        Nuevo
    </button><br><br>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Lista de Clientes</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="tableClients" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Código</th>
                <th>Código Área</th>
                <th>Área</th>
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
    var dataClients;

    $(document).ready(function() {
        getDataClients();
    } );

    function initTableClients()
    {
         tableClients =  $('#tableClients').DataTable( {
                        destroy: true,
                        data: dataClients,
                        columns: [
                            { data: 'id' },
                            { data: 'area_id'},
                            { data: 'area.name' },
                            { data: 'first_name' },
                            { data: 'second_name' },
                            { data: 'first_lastname' },
                            { data: 'second_lastname' },
                            { data: 'nickname' },
                            { data: null, defaultContent: "<button class ='btnDeleteClient btn btn-danger btn-xs' title='Eliminar' ><span class='fa fas fa-trash'></span></button>\n\
                                                           <button onclick='openModalCliente(2)' class ='btnShowCliente btn btn-primary btn-xs' title='Actualizar'><span class='fa fas fa-edit'></button>"
                            }
                        ],
                        "columnDefs": [
                            {
                                "targets": [ 0 ],
                                "visible": false
                            },
                            {
                                "targets": [ 1 ],
                                "visible": false
                            }
                        ]
                    } );

        $('#tableClients tbody').on( 'click', '.btnShowCliente', function () {
            rowClient = tableClients.row($(this).parents('tr') ).data();
            console.log('rowClienteSelected:', rowClient);
             $('#first_name').val(rowClient['first_name']);
             $('#second_name').val(rowClient['second_name']);
             $('#nickname').val(rowClient['nickname']);
             $('#first_lastname').val(rowClient['first_lastname']);
             $('#second_lastname').val(rowClient['second_lastname']);
             $('#area_id').val(rowClient['area_id']);
        });
    }

    function getDataClients()
    {
        $.ajax({
            dataType: 'json',
            url: 'getAllClients',
        }).done(function(data) {
            dataClients = data;
            console.log('dataClientes:',dataClients);
            initTableClients();
        });
    }

    $("#btnCreateClient").click(function() {

        $.ajax({
            dataType: 'json',
            type:'POST',
            url: "client",
            data: $("#formClient").serialize(),
        }).done(function(data){        
            swal('¡Bien!', 'Registro agregado', 'success')
            getDataClients();
            closeModal();
        });
    });


    $("#btnUpdateClient").click(function() {

        $.ajax({
            dataType: 'json',
            type:'PUT',
            url: "client/"+rowClient['id'],
            data: $("#formClient").serialize(),
        }).done(function(data){
            console.log("result update:",data);
            swal('¡Bien!', 'Registro actualizado', 'success')
            getDataClients();
            closeModal();
        });
    });


    $('#tableClients tbody').on( 'click', '.btnDeleteClient', function () {

        var rowClient = tableClients.row($(this).parents('tr') ).data();
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
                                url: "client/"+rowClient['id'],
                            }).done(function(data){
                                console.log("result delete:",data);                                
                                getDataClients();
                            });

                    swal('¡Registro eliminado!', '¡Éxito!', 'success')
                }
            })
    });

    function resetModal()
    {
        $('#formClient').trigger("reset");
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
            $("#btnUpdateClient").hide();
            $("#btnCreateClient").show();
            $(".modal-title").text("Crear Cliente");
        }
        else
        {
            $("#btnUpdateClient").show();
            $("#btnCreateClient").hide();
            $(".modal-title").text("Actualizar Cliente");
        }
        $('#modalClient').modal('show');
    }

</script>
@endsection
