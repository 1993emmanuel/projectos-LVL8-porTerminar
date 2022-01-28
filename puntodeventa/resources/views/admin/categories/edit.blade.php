@extends('layouts.admin')

@section('title','Categorias Editar')

@section('styles')
@endsection

@section('create')
	<li class="nav-item d-none d-lg-flex">
		<a href="{{route('categories')}}" class="nav-link">
			<span class="btn btn-primary">Ver Categorias</span>
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
			<h3 class="page-title">Editar Categoria</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item"><a href="{{route('categories')}}">Categorias</a></li>
				<li class="breadcrumb-item active" aria-current="page">Editar Categoria</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar Categorias</h4>
                        </div>

                        {!! Form::model($category,['route'=>['categories.update',$category], 'method'=>'PUT']) !!}
	                        
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" class="form-control" placeholder="nombre de la categoria" required value="{{$category->name}}">
							</div>

							<div class="form-group">
								<label for="description">Description</label>
								<textarea name="description" id="description" class="form-control" placeholder="Ingresa una descripcion de la categoria" rows="3">{{$category->description}}</textarea>
							</div>

	                        <button type="submit" class="btn btn-primary">Editar</button>
	                        <a href="{{route('categories')}}" class="btn btn-light">Cancelar</a>
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

