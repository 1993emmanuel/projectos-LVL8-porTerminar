@extends('layouts.admin')

@section('title','Categorias Crear')

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
			<h3 class="page-title">Registrar Categoria</h3>
		</div>
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
				<li class="breadcrumb-item"><a href="{{route('categories')}}">Categorias</a></li>
				<li class="breadcrumb-item active" aria-current="page">Crear Categoria</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de Categorias</h4>
                        </div>

                        {!! Form::open(['route'=>'categories.store', 'method'=>'POST']) !!}
	                        @include('admin.categories._form')
	                        <button type="submit" class="btn btn-primary">Registrar</button>
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

