@extends('layouts.main', ['activePage'=>'users', 'titlePage'=>'Usuario Detalles'])

@section('content')

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header card-header-primary">
							<div class="card-title">
								Datos del usuario
								<p class="card-category">Vista detallada de los datos del usaurio {{$user->name}}</p>
							</div>
						</div>

						<div class="card-body">
								@if(session('success'))
									<div class="alert alert-success" role="success">
										{{session('success')}}
									</div>
								@endif
							<div class="row">
								<div class="col-md-4">
									<div class="card card-user">
										<div class="card-body">
											<p class="card-text">
												<div class="author">
													<a href="#">
														<img src="{{asset('/img/faces/avatar.jpg')}}" alt="image" class="avatar">
														<h5 class="title mt-3">{{$user->name}}</h5>
													</a>
													<p class="description">
														{{$user->username}} <br>
														{{$user->email}} <br>
														{{$user->created_at}} <br>
													</p>
												</div>
											</p>
											<div class="card-description">
												Lorem ipsum dolor, sit amet consectetur adipisicing, elit. Quaerat modi culpa placeat reprehenderit iure harum, omnis, ratione quidem cum odio soluta quis alias voluptatibus doloribus nobis deleniti itaque voluptate
											</div>
										</div>
										<div class="card-footer">
											<div class="button-container">
												<button class="btn btn-sm btn-primary">Editar</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						

					</div>
				</div>
			</div>
		</div>
	</div>


@endsection