@extends('layouts.admin')

@section('title','Categorias Index')

@section('styles')
@endsection

@section('create')
	<li class="nav-item d-none d-lg-flex">
		<a href="{{route('categories.create')}}" class="nav-link">
			<span class="btn btn-primary">+ Crear Nueva</span>
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
				<li class="breadcrumb-item active" aria-current="page">Todas las categorias</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Categorias</h4>
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
										<th>Name</th>
										<th>Description</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($categories as $category)
									<tr>
										<td scope="row">{{$category->id}}</td>
										<td>
											{{-- <a href="{{route('categories.show',$category)}}">{{$category->name}}</a> --}}
											{{$category->name}}
										</td>
										<td>{{ $category->description }}</td>
										<td style="width: 50px;">
										{!!Form::open(['route'=>['categories.destroy',$category],'method'=>'DELETE'])!!}
											<a href="{{route('categories.edit',$category)}}" title="Editar" 
												class="jsgrid-button jsgrid-edit-button">
													<i class="far fa-edit"></i>
											</a>
											<button href="{{route('categories.destroy',$category)}}" title="Eliminar" 
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

