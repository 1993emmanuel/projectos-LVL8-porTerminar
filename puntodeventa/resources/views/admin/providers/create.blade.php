@extends('layouts.admin')

@section('title','Providers Crear')

@section('styles')
@endsection

@section('create')
	<li class="nav-item d-none d-lg-flex">
		<a href="{{route('providers')}}" class="nav-link">
			<span class="btn btn-primary">Ver Providers</span>
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
			<h3 class="page-title">Registrar Proveedor</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item"><a href="{{route('providers')}}">Proveedor</a></li>
				<li class="breadcrumb-item active" aria-current="page">Crear Proveedor</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de Proveedores</h4>
                        </div>

                        {!! Form::open(['route'=>'providers.store', 'method'=>'POST']) !!}
                        	<div class="form-group">
                        		<label for="name">Nombre</label>
                        		<input type="text" name="name" id="name" 
                        				class="form-control" aria-describedby="helpId" required>
                        	</div>

                        	<div class="form-group">
                        		<label for="email">Correo Electronico</label>
                        		<input type="email" name="email" id="email" placeholder="ejemplo@gmail.com" 
                        				class="form-control" aria-describedby="helpId" required>
                        	</div>

                        	<div class="form-group">
                        		<label for="ruc_number">Numero de RUC</label>
                        		<input type="number" name="ruc_number" id="ruc_number" 
                        				class="form-control" aria-describedby="helpId" required>
                        	</div>

                        	<div class="form-group">
                        		<label for="address">Direccion</label>
                        		<input type="text" name="address" id="address" 
                        				class="form-control" aria-describedby="helpId" required>
                        	</div>

                        	<div class="form-group">
                        		<label for="phone">Telefono/Celular</label>
                        		<input type="number" name="phone" id="phone" 
                        				class="form-control" aria-describedby="helpId" required>
                        	</div>

	                        <button type="submit" class="btn btn-primary">Registrar</button>
	                        <a href="{{route('providers')}}" class="btn btn-light">Cancelar</a>
                        {!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection


@section('scripts')
	{!! Html::script('melody/js/data-table.js') !!}
@endsection

