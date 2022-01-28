

<div class="form-group">
	<label for="provider_id">Proveedor</label>
	<select name="provider_id" id="provider_id" class="form-control">
		@foreach($providers as $provider)
			<option value="{{$provider->id}}">{{$provider->name}}</option>
		@endforeach
	</select>
</div>

<div class="form-group">
	<label for="tax">Impuestos</label>
	<input type="number" name="tax" id="tax" class="form-control" placeholder="18%">
</div>

<div class="form-group">
	<label for="product_id">Productos</label>
	<select name="product_id" id="product_id" class="form-control">
		@foreach($products as $product)
			<option value="{{$product->id}}">{{$product->name}}</option>
		@endforeach
	</select>
</div>

<div class="form-group">
	<label for="quantity">Cantidad</label>
	<input type="number" name="quantity" id="quantity" class="form-control" placeholder="cantidad">
</div>

<div class="form-group">
	<label for="price">Precio</label>
	<input type="number" name="price" id="price" class="form-control" placeholder="18%">
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
					<th>Precio(PEN)</th>
					<th>Cantidad</th>
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
				<tr id="dvOcultar">
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