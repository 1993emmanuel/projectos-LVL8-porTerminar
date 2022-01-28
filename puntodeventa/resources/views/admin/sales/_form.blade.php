

<div class="form-group">
	<label for="client_id">Clientes</label>
	<select name="client_id" id="client_id" class="form-control">
		@foreach($clients as $client)
			<option value="{{$client->id}}">{{$client->name}}</option>
		@endforeach
	</select>
</div>

<div class="form-group">
	<label for="tax">Impuestos</label>
	<input type="number" name="tax" id="tax" class="form-control" placeholder="18%">
</div>

<div class="form-group">
	<label for="product_id">Producto</label>
	<select name="product_id" id="product_id" class="form-control">
		<option value="" disabled selected>Seleccione un producto</option>
		@foreach($products as $product)
			<option value="{{$product->id}}_{{$product->stock}}_{{$product->sell_price}}">{{$product->name}}</option>
		@endforeach
	</select>
</div>

<div class="form-group">
	<label for="stock_actual">Stock Actual</label>
	<input type="" name="" class="form-control muted" disabled id="stock">
</div>


<div class="form-group">
	<label for="quantity">Cantidad</label>
	<input type="number" name="quantity" id="quantity" class="form-control" placeholder="cantidad">
</div>

<div class="form-group">
	<label for="price">Precio de venta</label>
	<input type="number" name="price" id="price" class="form-control" placeholder="$$$$" disabled>
</div>

<div class="form-group">
	<label for="discount">% Descuento</label>
	<input type="number" name="discount" id="discount" class="form-control" placeholder="18%" value="0">
</div>


<div class="form-group mb-4">
	<button type="button" class="btn btn-primary float-right" id="agregar">Agregar Producto</button>
</div>

<div class="form-group">
	<h4 class="card-title">Detalles compra</h4>
	<div class="table-responsive col-md-12">
		<table id="detalles" class="table table-striped">
			<thead>
				<tr>
					<th>Eliminar</th>
					<th>Producto</th>
					<th>Precio de Venta(PEN)</th>
					<th>Cantidad</th>
					<th>% Descuento</th>
					<th>SubTotal(PEN)</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th colspan="4">
						<p align="right">Total</p>
					</th>
					<th colspan="4">
						<p align="right"><span id="total">PEN 0.00</span></p>
					</th>
				</tr>
				<tr>
					<th colspan="4">
						<p align="right">Total Impuesto (18%)</p>
					</th>
					<th colspan="4">
						<p align="right"><span id="total_impuesto">PEN 0.00</span></p>
					</th>
				</tr>
				<tr>
					<th colspan="4">
						<p align="right">Total a Pagar</p>
					</th>
					<th>
						<p align="right">
							<span align="right" id="total_pagar_html">PEN 0.00</span><input type="hidden" name="total" id="total_pagar">
						</p>
					</th>
				</tr>
			</tfoot>
			<tbody>
			</tbody>
		</table>
	</div>
</div>