@extends('layouts.master')
@section('breadcrumb','Cliente')
@section('content')
@include('client.create')
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalClient">
        Nueva
    </button><br><br>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Lista de Clientes</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="tableAreas" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Seg. nombre</th>
                <th>Apellido</th>
                <th>Seg. Apellido</th>
                <th>Apodo</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection