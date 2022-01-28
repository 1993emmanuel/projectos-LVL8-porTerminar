@extends('layouts.admin')

@section('title','Providers Index')

@section('styles')
@endsection

@section('create')
	<li class="nav-item d-none d-lg-flex">
		<a href="{{route('providers.create')}}" class="nav-link">
			<span class="btn btn-primary">+ Crear Proveedor</span>
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
			<h3 class="page-title">Dashboard Providers</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Todas los Provedores</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Proveedores</h4>
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
										<th>Correo Electronico</th>
										<th>Telefono/Celular</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach($providers as $provider)
									<tr>
										<td scope="row">{{$provider->id}}</td>
										<td>
											<a href="{{route('providers.show',$provider)}}">{{$provider->name}}</a>
											{{-- {{$provider->name}} --}}
										</td>
										<td>{{ $provider->email }}</td>
										<td>{{ $provider->phone }}</td>
										<td style="width: 50px;">
										{!!Form::open(['route'=>['providers.destroy',$provider],'method'=>'DELETE'])!!}
											<a href="{{route('providers.edit',$provider)}}" title="Editar" 
												class="jsgrid-button jsgrid-edit-button">
													<i class="far fa-edit"></i>
											</a>
											<button href="{{route('providers.destroy',$provider)}}" title="Eliminar" 
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

