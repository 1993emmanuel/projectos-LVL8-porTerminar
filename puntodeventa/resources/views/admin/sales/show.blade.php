@extends('layouts.admin')


@section('title','Ventas Detalles')

@section('styles')
@endsection

@section('create')
	<li class="nav-item d-none d-lg-flex">
		<a href="{{route('sales')}}" class="nav-link">
			<span class="btn btn-primary">Ver Ventas</span>
		</a>
	</li>
@endsection

@section('options')
@endsection

@section('preference')
@endsection


@section('content')
      <div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">Detalles Ventas</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item"><a href="{{route('sales')}}">Ventas</a></li>
				<li class="breadcrumb-item active" aria-current="page">
					Detalles de la Venta
                </li>
			</ol>
		</nav>
            <div class="row">
                  <div class="col-12">
                        <div class="card">

                        	<div class="card-body">

                        		<div class="form-group row">
                        			<div class="col-md-4 text-center">
                        				<label class="form-control label">Cliente</label>
                        				<p class="text-muted">
                        					<a href="{{route('clients.show',$sale->client_id)}}">{{$sale->client->name}}</a>
                        				</p>
                        			</div>
                        			<div class="col-md-4 text-center">
                        				<label class="form-control label">Vendedor/Correo del Vendedor</label>
                        				<p>{{$sale->user->email}}</p>
                        			</div>
                        			<div class="col-md-4 text-center">
                        				<label class="form-control label">Numero de Venta</label>
                        				<p class="text-muted">{{$sale->id}}</p>
                        			</div>
                        		</div>
                        		<br/><br/>

                        		<div class="form-group">
                        			<h4 class="card-title">Detalles de Venta</h4>
                        			<div class="table-responsive col-md-12">
                        				<table id="salesDetails" class="table">
                        					<thead>
                        						<tr>
	                        						<th class="lead">Producto</th>
	                        						<th class="lead">Precio Venta (PEN)</th>
	                        						<th class="lead">Descuento (%)</th>
	                        						<th class="lead">Cantidad</th>
	                        						<th class="lead">SubTotal (PEN)</th>
                        						</tr>
                        					</thead>
                        					<tfoot>
                        						<tr>
                        							<th colspan="4"><p align="right">SUB TOTAL</p></th>
                        							<th>
                        								<p align="right">{{number_format($subtotal,2)}}</p>
                        							</th>
                        						</tr>
                        						<tr>
                        							<th colspan="4"><p align="right">TOTAL IMPUESTO ({{$sale->tax}}%)</p></th>
                        							<th>
                        								<p align="right">
                        									s/{{number_format($subtotal*$sale->tax/100,2)}}
                        								</p>
                        							</th>
                        						</tr>
                        						<tr>
                        							<th colspan="4"><p align="right">Total: </p></th>
                        							<th><p align="right">s/{{number_format($sale->total,2)}}</p></th>
                        						</tr>
                        					</tfoot>
                        					<tbody>
                        						@foreach($salesDetalles as $salesDetalle)
                        							<tr>
                        								<td>{{$salesDetalle->product->name}}</td>
                        								<td>{{$salesDetalle->price}}</td>
                        								<td>{{$salesDetalle->discount}}</td>
                        								<td>{{$salesDetalle->quantity}}</td>
                        								<td>
                        									{{number_format($salesDetalle->quantity * $salesDetalle->price - $salesDetalle->quantity * $salesDetalle->price*$salesDetalle->discount/100, 2 )}}
                        								</td>
                        							</tr>
                        						@endforeach
                        					</tbody>
                        				</table>
                        			</div>
                        		</div>

                        	</div>

                            <div class="card-footer text-muted">
                                <a href="{{route('sales')}}" class="btn btn-primary float-right">Regresar</a>
                            </div>

                        </div>
                  </div>
            </div>
	</div>
@endsection


@section('scripts')
	{!! Html::script('melody/js/data-table.js') !!}
@endsection

