@extends('layouts.master')
@section('breadcrumb1','Compras')
@section('breadcrumb2','Factura')
@section('content')
@include('invoice.create')
    <button type="button" onclick="openModalInvoice(1)" class="btn btn-success">
        Nueva
    </button><br><br>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Lista de Facturas</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="tableInvoices" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th>Fecha</th>
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
    var dataInvoices;

    $(document).ready(function() {
        getDataInvoices();
    } );

    function initTableInvoices()
    {
         tableInvoices =  $('#tableInvoices').DataTable( {
                        destroy: true,
                        data: dataInvoices,
                        columns: [
                            { data: 'id' },
                            { data: 'description' },
                            { data: 'amount' },
                            { data: 'date' },
                            { data: null, defaultContent: "<button class ='btnDeleteInvoice btn btn-danger btn-xs' title='Eliminar' ><span class='fa fas fa-trash'></span></button>\n\
                                                           <button onclick='openModalInvoice(2)' class ='btnShowInvoice btn btn-primary btn-xs' title='Actualizar'><span class='fa fas fa-edit'></button>"
                            }
                        ],
                        "columnDefs": [
                            {
                                "targets": [ 0 ],
                                "visible": false
                            }
                        ]
                    } );

        $('#tableInvoices tbody').on( 'click', '.btnShowInvoice', function () {
            rowInvoice = tableInvoices.row($(this).parents('tr') ).data();
            console.log('rowInvoiceSelected:', rowInvoice);
            $('#description').val(rowInvoice['description']);
            $('#amount').val(rowInvoice['amount']);
            $('#date').val(rowInvoice['date']);
        });
    }

    function getDataInvoices()
    {
        $.ajax({
            dataType: 'json',
            url: 'getAllInvoices',
        }).done(function(data) {
            dataInvoices = data;
            console.log('dataInvoices:',dataInvoices);
            initTableInvoices();
        });
    }

 /*   $("#btnCreateInvoice").click(function() {

        $.ajax({
            dataType: 'json',
            type:'POST',
            url: "invoice",
            data: $("#formInvoice").serialize(),
        }).done(function(data){        
            swal('¡Bien!', 'Registro agregado', 'success')
            getDataInvoices();
            closeModal();
        });
    });
    */


    $("#formInvoice").on('submit',function(e) {
        
        e.preventDefault();
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: "invoice",
            data: new FormData(this),
            contentType: false,
            processData: false
        }).done(function(data){        
            swal('¡Bien!', 'Registro agregado', 'success')
            getDataInvoices();
            closeModal();
        });

    });


    $("#btnUpdateInvoice").click(function() {

        $.ajax({
            dataType: 'json',
            type:'PUT',
            url: "invoice/"+rowInvoice['id'],
            data: $("#formInvoice").serialize(),
        }).done(function(data){
            console.log("result update:",data);
            swal('¡Bien!', 'Registro actualizado', 'success')
            getDataInvoices();
            closeModal();
        });
    });


    $('#tableInvoices tbody').on( 'click', '.btnDeleteInvoice', function () {

        var rowInvoice = tableInvoices.row($(this).parents('tr') ).data();
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
                                url: "invoice/"+rowInvoice['id'],
                            }).done(function(data){
                                console.log("result delete:",data);                                
                                getDataInvoices();
                            });

                    swal('¡Registro eliminado!', '¡Éxito!', 'success')
                }
            })
    });

    function resetModal()
    {
        $('#formInvoice').trigger("reset");
    }

    function closeModal()
    {
        $('#modalInvoice').modal('hide');
    }

    function openModalInvoice(action)
    {
        if(action == 1)
        {
            resetModal();
            $("#btnUpdateInvoice").hide();
            $("#btnCreateInvoice").show();
            $(".modal-title").text("Resgistrar Factura");
        }
        else
        {
            $("#btnUpdateInvoice").show();
            $("#btnCreateInvoice").hide();
            $(".modal-title").text("Actualizar Factura");
        }
        $('#modalInvoice').modal('show');
    }

</script>
@endsection