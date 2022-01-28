@extends('layouts.admin')

@section('title','Productos Editar')

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
			<h3 class="page-title">Editar Proveedor</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item"><a href="{{route('products')}}">Producto</a></li>
				<li class="breadcrumb-item active" aria-current="page">Editar Producto</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar Producto</h4>
                        </div>
                        {{-- {!! Form::model($category,['route'=>['categories.update',$category], 'method'=>'PUT']) !!} --}}
                        {!! Form::model($product,['route'=>['products.update',$product], 'method'=>'PUT','files'=>true]) !!}
                        	<div class="form-group">
                        		<label for="name">Nombre</label>
                        		<input type="text" name="name" id="name" 
                        				class="form-control" aria-describedby="helpId" required
                                                value="{{$product->name}}">
                        	</div>

                              <div class="form-group">
                                    <label for="sell_price">Precio de Venta</label>
                                    <input type="numebr" name="sell_price" id="sell_price" 
                                                class="form-control" aria-describedby="helpId" required
                                                value="{{$product->sell_price}}">
                              </div>

                              <div class="form-group">
                                    <label for="category_id">Categoria</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                          @foreach($categories as $categoria)
                                                <option value="{{$categoria->id}}"
                                                      @if($categoria->id == $product->category_id)
                                                            selected 
                                                      @endif
                                                >{{$categoria->name}}
                                                </option>
                                          @endforeach
                                    </select>
                              </div>

                              <div class="form-group">
                                    <label for="provider_id">Proveedor</label>
                                    <select name="provider_id" id="provider_id" class="form-control">
                                          @foreach($providers as $provedor)
                                                <option value="{{$provedor->id}}"
                                                      @if($provedor->id == $product->provider_id)
                                                            selected 
                                                      @endif
                                                      >{{$provedor->name}}
                                                </option>
                                          @endforeach
                                    </select>
                              </div>

{{--                               <div class="custom-file mb-4">
                                    <input type="file" class="custom-file-input" id="image" lang="es" name="image">
                                    <label class="custom-file-label" for="image">Seleccionar Archivo</label>
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

	                        <button type="submit" class="btn btn-primary">Editar</button>
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

