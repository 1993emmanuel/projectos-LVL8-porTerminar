@extends('layouts.admin')


@section('title','Compras Detalles')

@section('styles')
@endsection

@section('create')
	<li class="nav-item d-none d-lg-flex">
		<a href="{{route('purcharses')}}" class="nav-link">
			<span class="btn btn-primary">Ver Compras</span>
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
			<h3 class="page-title">Detalles Compras</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item"><a href="{{route('purcharses')}}">Compras</a></li>
				<li class="breadcrumb-item active" aria-current="page">
					Detalles de la Compra
                </li>
			</ol>
		</nav>
            <div class="row">
                  <div class="col-12">
                        <div class="card">

                        	<div class="card-body">
                        		<div class="form-group row">
                        			<div class="col-md-6 text-center">
                        				<label class="form-control-label" for="name">Proveedor</label>
                        				<p>{{$purchase->provider->name}}</p>
                        			</div>
                        			<div class="col-md-6 text-center">
                        				<label class="form-control-label" for="num_compra">Numero de Compra</label>
                        				<p>{{$purchase->id}}</p>
                        			</div>
                        		</div>
                        	</div>
                        	<br><br>

                        	<div class="form-group row">
                        		<h4 class="card-title ml-3">Detalle Compra</h4>
                        		<div class="table-responsive col-md-12">
                        			<table id="detalles" class="table">
                        				<thead>
                        					<tr>
                        						<th>Producto</th>
                        						<th>Precio</th>
                        						<th>Cantidad</th>
                        						<th>Sub Total(PEN)</th>
                        					</tr>
                        				</thead>
                        				<tfoot>
                        					<tr>
                        						<th colspan="3">
                        							<p align="right">Subtotal sin impuesto</p>
                        						</th>
                        						<th>
                        							<p align="right">s/{{number_format($subtotal,2)}}</p>
                        						</th>
                        					</tr>
                        					<tr>
	                    						<th colspan="3"><p align="right">Total impuesto ({{$purchase->tax}}):</p></th>
	                    						<th>
	                    							<p align="right">S/{{number_format($subtotal * $purchase->tax/100,2) }}</p>
	                    						</th>
                        					</tr>
                        					<tr>
                        						<th colspan="3"><p align="right">Total : </p></th>
                        						<th><p align="right">s/{{number_format($purchase->total, 2)}}</p></th>
                        					</tr>
                        				</tfoot>
                        				<tbody>
                        					@foreach($purchaseDetails as $purchaseDetail)
                        					<tr>
                        						<td>{{$purchaseDetail->product->name}}</td>
                        						<td>{{$purchaseDetail->price}}</td>
                        						<td>{{$purchaseDetail->quantity}}</td>
                        						<td>
                        							s/{{number_format($purchaseDetail->quantity * $purchaseDetail->price,2)}}
                        						</td>
                        					</tr>
                        					@endforeach
                        				</tbody>
                        			</table>
                        		</div>
                        	</div>

                            <div class="card-footer text-muted">
                                <a href="{{route('purcharses')}}" class="btn btn-primary float-right">Regresar</a>
                            </div>

                        </div>
                  </div>
            </div>
	</div>
@endsection


@section('scripts')
	{!! Html::script('melody/js/data-table.js') !!}
@endsection

