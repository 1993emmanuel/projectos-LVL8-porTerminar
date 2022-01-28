@extends('layouts.admin')

@section('title','Providers Editar')

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
			<h3 class="page-title">Editar Proveedor</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item"><a href="{{route('providers')}}">Proveedor</a></li>
				<li class="breadcrumb-item active" aria-current="page">Editar Proveedor</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar Proveedores</h4>
                        </div>
                        {{-- {!! Form::model($category,['route'=>['categories.update',$category], 'method'=>'PUT']) !!} --}}
                        {!! Form::model($provider,['route'=>['providers.update',$provider], 'method'=>'PUT']) !!}
                        	<div class="form-group">
                        		<label for="name">Nombre</label>
                        		<input type="text" name="name" id="name" 
                        				class="form-control" aria-describedby="helpId" required
                                                value="{{$provider->name}}">
                        	</div>

                        	<div class="form-group">
                        		<label for="email">Correo Electronico</label>
                        		<input type="email" name="email" id="email" placeholder="ejemplo@gmail.com" 
                        				class="form-control" aria-describedby="helpId" required
                                                value="{{$provider->email}}">
                        	</div>

                        	<div class="form-group">
                        		<label for="ruc_number">Numero de RUC</label>
                        		<input type="number" name="ruc_number" id="ruc_number" 
                        				class="form-control" aria-describedby="helpId" required
                                                value="{{$provider->ruc_number}}">
                        	</div>

                        	<div class="form-group">
                        		<label for="address">Direccion</label>
                        		<input type="text" name="address" id="address" 
                        				class="form-control" aria-describedby="helpId" required
                                                value="{{$provider->address}}">
                        	</div>

                        	<div class="form-group">
                        		<label for="phone">Telefono/Celular</label>
                        		<input type="number" name="phone" id="phone" 
                        				class="form-control" aria-describedby="helpId" required
                                                value="{{$provider->phone}}">
                        	</div>

	                        <button type="submit" class="btn btn-primary">Editar</button>
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

