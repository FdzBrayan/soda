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
<form>
  <div class="row">
    <div class="col">
      <label for="clients">Cliente</label>
      <select name="client_id" id="clients" class="form-control">
        @foreach($clients as $client)
        <option value="{{ $client->id }}">{{$client->full_name}}</option>
        @endforeach
      </select>
    </div>
    <div class="col">
      <label for="validationServer02">Fecha</label>
      <input type="date" class="form-control" id="" placeholder="Fecha" required>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label for="products">Producto</label>
      <select name="product_id" id="products" class="form-control">
        @foreach($products as $product)
        <option value="{{ $product->id }}">{{$product->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="col">
      <label for="">Cantidad</label>
      <input type="number" class="form-control" id="" placeholder="Cantidad" required>
    </div>
    <div class="col">
      <label for="">Precio Uni.</label>
      <input type="text" class="form-control" id="" placeholder="Precio Uni." required>
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
    $('#products').select2({
                ajax : {
                    url : 'getAllProducts',
                    dataType : 'json',
                    delay : 200,
                    data : function(params){
                        return {
                            q : params.term,
                            page : params.page
                        };
                    },
                    processResults : function(data, params){
                      console.log('data:',data);
                        params.page = params.page || 1;
                        return {
                            results : data,
                            pagination: {
                                more : (params.page  * 10) < data.total
                            }
                        };
                    }
                },
                minimumInputLength : 1,
                templateResult : function (repo){
                    if(repo.loading) return repo.name;
                    var markup = "<img src=images/products/"+repo.image+" height='42' width='42'></img> &nbsp; "+ repo.name;
                    return markup;
                },
                templateSelection : function(repo)
                {
                    return repo.text;
                },
                escapeMarkup : function(markup){ return markup; }
            });
  });
</script> 

@endsection