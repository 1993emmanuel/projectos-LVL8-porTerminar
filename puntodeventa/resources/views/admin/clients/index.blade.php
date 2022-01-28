@extends('layouts.admin')

@section('title','Clientes Index')

@section('styles')
@endsection

@section('create')
	<li class="nav-item d-none d-lg-flex">
		<a href="{{route('clients.create')}}" class="nav-link">
			<span class="btn btn-primary">+ Agregar Cliente</span>
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
			<h3 class="page-title">Dashboard Clientes</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Todas los Clientes</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Clientes</h4>
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

						<div class="table-responsive">
							<table id="order-listing" class="table">
								<thead>
									<tr>
										<th>ID</th>
										<th>Nombre</th>
										<th>DNI</th>
										{{-- <th>RUC</th> --}}
										<th>Telefono/Celular</th>
										<th>Correo</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach($clients as $client)
									<tr>
										<td scope="row">{{$client->id}}</td>
										<td>
											<a href="{{route('clients.show',$client)}}">{{$client->name}}</a>
											{{-- {{$client->name}} --}}
										</td>
										<td>{{ $client->dni }}</td>
										<td>{{ $client->phone}}</td>
										<td>{{ $client->email}}</td>
										<td style="width: 50px;">
										{!!Form::open(['route'=>['clients.destroy',$client],'method'=>'DELETE'])!!}
											<a href="{{route('clients.edit',$client)}}" title="Editar" 
												class="jsgrid-button jsgrid-edit-button">
													<i class="far fa-edit"></i>
											</a>
											<button href="{{route('clients.destroy',$client)}}" title="Eliminar" 
												class="jsgrid-button jsgrid-edit-button" type="submit">
													<i class="far fa-trash-alt"></i>
											</button>
											{!! Form::close() !!}
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
<?php
/*
									@foreach($products as $provider)
									<tr>
										<td scope="row">{{$provider->id}}</td>
										<td>
											<a href="{{route('products.show',$provider)}}">{{$provider->name}}</a>
											{{-- {{$provider->name}} --}}
										</td>
										<td>{{ $provider->stock }}</td>
										<td>{{ $provider->status }}</td>
										<td>{{ $provider->category->name}}</td>
										<td style="width: 50px;">
										{!!Form::open(['route'=>['products.destroy',$provider],'method'=>'DELETE'])!!}
											<a href="{{route('products.edit',$provider)}}" title="Editar" 
												class="jsgrid-button jsgrid-edit-button">
													<i class="far fa-edit"></i>
											</a>
											<button href="{{route('products.destroy',$provider)}}" title="Eliminar" 
												class="jsgrid-button jsgrid-edit-button" type="submit">
													<i class="far fa-trash-alt"></i>
											</button>
											{!! Form::close() !!}
										</td>
									</tr>
									@endforeach
									*/
?>