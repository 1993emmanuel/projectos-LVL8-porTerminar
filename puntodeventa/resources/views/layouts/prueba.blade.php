@extends('layouts.admin')

@section('title','Categorias Index')

@section('styles')
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
				<li class="breadcrumb-item"><a href="#">Tables</a></li>
				<li class="breadcrumb-item active" aria-current="page">Basic</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Striped Table</h4>
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
											<a href="{{route('categories.show',$category)}}">{{$category->name}}</a>
										</td>
										<td>{{ $category->description }}</td>
										<td style="width: 50px;">
										{!!Form::open(['route'=>['categories.destroy',$category],'method'=>'DELETE'])!!}
											<a href="{{route('categories.edit',$category)}}" title="Editar" 
												class="jsgrid-button jsgrid-edit-button">
													<i class="far fa-edit"></i>
											</a>
											<a href="{{route('categories.edit',$category)}}" title="Eliminar" 
												class="jsgrid-button jsgrid-edit-button" type="submit">
													<i class="far fa-trash-all"></i>
											</a>
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

	<tr class="selected" id="fila'+cont+'">
		<td>
			<button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');">
				<i class="fa fa-times"></i>
			</button>
		</td>
		<td><input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'</td>
		<td>
			<input type="hidden" name="price[]" value="'+parseFloat(price).toFixed(2)+'">
			<input class="form-control" type="number" value="'+parseFloat(price).toFixed(2)+'" disable>
			<input type="hidden" name="discount[]" value="'+parseFloat(discount)+'">
		</td>
		<td>
			<input type="hidden" name="discount[]" value="'+parseFloat(discount)+'">
			<input class="form-control" type="number" value="'+parseFloat(discount)+'" disabled>
		</td>
		<td><input type="hidden" name="quantity[]" value="'+quantity+'"><input class="form-control" type="number" value="'+quantity+'" disabled>
		</td><td align="right">s/'+parseFloat(subtotal[cont]).toFixed(2)+'</td>
	</tr>


@endsection


@section('scripts')
	{!! Html::script('melody/js/data-table.js') !!}

	<script>
	

	</script>

@endsection

