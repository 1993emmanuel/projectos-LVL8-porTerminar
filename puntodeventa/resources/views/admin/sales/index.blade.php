@extends('layouts.admin')

@section('title','Ventas Index')

@section('styles')
@endsection

@section('create')
	<li class="nav-item d-none d-lg-flex">
		<a href="{{route('sales.create')}}" class="nav-link">
			<span class="btn btn-primary">+ Nueva Venta</span>
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
			<h3 class="page-title">Dashboard</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Todas las Ventas</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Ventas</h4>
                            {{-- <i class="fas fa-ellipsis-v"></i> --}}
{{-- 							<div class="btn-group">
								<h4 class="card-title">
									<a href="#">
										<i class="fas fa-download"></i>
										Exportar
									</a>
								</h4>
							</div> --}}
                        </div>

{{-- 		'provider_id',
		'user_id',
		'purchase_date',
		'tax',
		'total',
		'status',
		'picture', --}}

						<div class="table-responsive">
							<table id="order-listing" class="table">
								<thead>
									<tr>
										<th>ID</th>
										<th>Fecha de Venta</th>
										<th>Total</th>
										<th>Estatus</th>
										<th style="width: 100px;">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($sales as $sale)
									<tr>
										<td scope="row">
											<a href="{{route('sales.show',$sale)}}">{{$sale->id}}</a>
										</td>
										<td>{{$sale->sale_date}}</td>
										<td>{{$sale->total}}</td>
										<td>{{$sale->status}}</td>
										<td style="width: 100px;">
{{-- 											<a href="{{route('purcharses.edit',$compras)}}" title="Editar" 
												class="jsgrid-button jsgrid-edit-button">
													<i class="far fa-edit"></i>
											</a> --}}
{{-- 											<button href="{{route('purcharses.destroy',$compras)}}" title="Eliminar" 
												class="jsgrid-button jsgrid-edit-button" type="submit">
													<i class="far fa-trash-alt"></i>
											</button> --}}
											<a href="{{route('sales.pdf',$sale)}}" class="jsgrid-button jsgrid-edit-button">
												<i class="far fa-file-pdf"></i>
											</a>
											<a href="{{route('sales.print',$sale)}}" class="jsgrid-button jsgrid-edit-button">
												<i class="fas fa-print"></i>
											</a>
											<a href="{{route('sales.show',$sale)}}" class="jsgrid-button jsgrid-edit-button">
												<i class="far fa-eye"></i>
											</a>

										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection


@section('scripts')
	{!! Html::script('melody/js/data-table.js') !!}
@endsection

