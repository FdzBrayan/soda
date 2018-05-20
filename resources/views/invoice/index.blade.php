@extends('layouts.master')
@section('breadcrumb1','Compras')
@section('breadcrumb2','Factura')
@section('content')
@include('invoice.create')
    <button type="button" onclick="openModalCliente(1)" class="btn btn-success">
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