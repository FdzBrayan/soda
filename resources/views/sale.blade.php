@extends('layouts.master') 
@section('breadcrumb','Ventas')
@section('content')
<style>
  #formSale{
    margin: 2%;
  }

  #tableProducts{
    margin: 2%;
  }
</style>

<div class="container">
  <div class="form-group">
  </div>
</div>
<form id="formSale">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="clients">Cliente</label>
      <select name="client_id" id="clients" class="form-control">
        @foreach($clients as $client)
        <option value="{{ $client->id }}">{{$client->full_name}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationServer02">Fecha</label>
      <input type="date" class="form-control is-valid" id="validationServer02" placeholder="Last name" value="Otto" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">

      <span class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
    <div class="invalid-feedback">
      Please choose a username.
    </div>
  </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="products">Producto</label>
      <select name="product_id" id="products" class="form-control">
        @foreach($clients as $client)
        <option value="{{ $client->id }}">{{$client->full_name}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationServer04">Cantidad</label>
      <input type="number" class="form-control is-invalid" id="validationServer04" placeholder="State" required>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationServer05">Precio Uni.</label>
      <input type="text" class="form-control is-invalid" id="validationServer05" placeholder="Precio Uni." required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>
  </div>
</form>
<table class="table" id="tableProducts">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio Uni.</th>
      <th scope="col">Subtotal</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Coca cola</td>
      <td>1</td>
      <td>1000</td>
      <td>1000</td>
    </tr>
    <tr>
      <td>Desayuno</td>
      <td>1</td>
      <td>2800</td>
      <td>2800</td>
    </tr>
    <tr>
      <td>Birra</td>
      <td>3</td>
      <td>1000</td>
      <td>3000</td>
    </tr>
  </tbody>
</table>
<button class="btn btn-primary" type="submit">Guardar</button>
@endsection 

@section('script')

<script>
  $(document).ready(function () {
    $('#clients').select2();
  });
</script> 

@endsection