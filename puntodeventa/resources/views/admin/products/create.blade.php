@extends('layouts.admin')

@section('title','Products Crear')

@section('styles')
@endsection

@section('create')
	<li class="nav-item d-none d-lg-flex">
		<a href="{{route('products')}}" class="nav-link">
			<span class="btn btn-primary">Ver Productos</span>
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
			<h3 class="page-title">Registrar Producto</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item"><a href="{{route('products')}}">Productos</a></li>
				<li class="breadcrumb-item active" aria-current="page">Crear Producto</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de Productos</h4>
                        </div>

                        {!! Form::open(['route'=>'products.store', 'method'=>'POST', 'files'=>true]) !!}
                        	<div class="form-group">
                        		<label for="name">Nombre</label>
                        		<input type="text" name="name" id="name" 
                        				class="form-control" aria-describedby="helpId" required>
                        	</div>

                              <div class="form-group">
                                    <label for="sell_price">Precio de Venta</label>
                                    <input type="numebr" name="sell_price" id="sell_price" 
                                                class="form-control" aria-describedby="helpId" required>
                              </div>

                              <div class="form-group">
                                    <label for="category_id">Categoria</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                          @foreach($categories as $categoria)
                                                <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                                          @endforeach
                                    </select>
                              </div>

                              <div class="form-group">
                                    <label for="provider_id">Proveedor</label>
                                    <select name="provider_id" id="provider_id" class="form-control">
                                          @foreach($providers as $provedor)
                                                <option value="{{$provedor->id}}">{{$provedor->name}}</option>
                                          @endforeach
                                    </select>
                              </div>

{{--                               <div class="custom-file mb-4">
                                    <input type="file" class="custom-file-input" id="picture" lang="es" name="picture">
                                    <label class="custom-file-label" for="picture">Seleccionar Archivo</label>
                              </div> --}}

                              <div class="card-body">
                                    <h4 class="card-title d-flex">Imagen del Producto
                                          <small class="ml-auto align-self-end">
                                                <a href="" class="font-weight-light" target="_blank">
                                                      Seleccionar Archivo
                                                </a>
                                          </small>
                                    </h4>
                                    <input type="file" class="dropify" name="picture" id="picture">
                              </div>

	                        <button type="submit" class="btn btn-primary">Registrar</button>
	                        <a href="{{route('products')}}" class="btn btn-light">Cancelar</a>
                        {!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection


@section('scripts')
	{{-- {!! Html::script('melody/js/data-table.js') !!} --}}
      {!! Html::script('melody/js/dropify.js') !!}
@endsection

