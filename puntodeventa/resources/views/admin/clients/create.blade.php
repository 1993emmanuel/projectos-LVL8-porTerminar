@extends('layouts.admin')

@section('title','Clientes Crear')

@section('styles')
@endsection

@section('create')
	<li class="nav-item d-none d-lg-flex">
		<a href="{{route('clients')}}" class="nav-link">
			<span class="btn btn-primary">Ver Clientes</span>
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
			<h3 class="page-title">Registrar Cliente</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item"><a href="{{route('clients')}}">Clientes</a></li>
				<li class="breadcrumb-item active" aria-current="page">Crear Cliente</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de Clientes</h4>
                        </div>
                        {{-- {!! Form::open(['route'=>'categories.store', 'method'=>'POST']) !!} --}}
                        {!! Form::open(['route'=>'clients.store', 'method'=>'POST']) !!}

                        	<div class="form-group">
                        		<label for="name">Nombre</label>
                        		<input type="text" name="name" id="name" 
                        				class="form-control" aria-describedby="helpId" required>
                                    <small class="form-text text-muted">Este campo no es Opcional</small>
                        	</div>

                              <div class="form-group">
                                    <label for="dni">DNI</label>
                                    <input type="text" name="dni" id="dni" 
                                                class="form-control" aria-describedby="helpId" required>
                                    <small class="form-text text-muted">Este campo no es Opcional</small>
                              </div>

                              <div class="form-group">
                                    <label for="ruc">RUC</label>
                                    <input type="text" name="ruc" id="ruc" 
                                                class="form-control" aria-describedby="helpId">
                                    <small class="form-text text-muted">Este campo es Opcional</small>
                              </div>

                              <div class="form-group">
                                    <label for="phone">Telefono/Celular</label>
                                    <input type="number" name="phone" id="phone"
                                                class="form-control" aria-describedby="helpId">
                                    <small class="form-text text-muted">Este campo es Opcional</small>
                              </div>

                              <div class="form-group">
                                    <label for="email">Correo Electronico</label>
                                    <input type="email" name="email" id="email" 
                                                class="form-control" aria-describedby="helpId">
                                    <small class="form-text text-muted">Este campo es Opcional</small>
                              </div>


	                        <button type="submit" class="btn btn-primary">Registrar</button>
	                        <a href="{{route('clients')}}" class="btn btn-light">Cancelar</a>

                        {!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection


@section('scripts')
	{{-- {!! Html::script('melody/js/data-table.js') !!} --}}
      {{-- {!! Html::script('melody/js/dropify.js') !!} --}}
@endsection

