@extends('layouts.main', ['activePage'=>'users', 'titlePage'=>'Editar Usuario'])

{{-- formulario para guardar un usuario --}}
@section('content')
	<div class="content">
		<div class="container-fluid">
			<div class="row">
{{-- 				@if( auth()->user()->id ==$user->id )
					<h1>{{ auth()->user()->name }}</h1>
				@else
					<div class="col-md-12">
						<div class="alert alert-danger text-center" role="alert">
							{{__('Estas tratando de editar un perfil que no te pertenece!!!!')}}
						</div>
					</div>
				@endif --}}
				<div class="col-md-12">
					<form action="{{route('users.update',$user->id)}}" method="POST" class="form-horizontal">
						@csrf
						@method('PUT')
						<div class="card">
							<div class="card-header card-header-primary">
								<h4 class="card-title">Usuario</h4>
								<p class="card-category">Edite Datos</p>
							</div>
							<div class="card-body">
								<div class="row">
									<label for="name" class="col-sm-2 col-form-label">Nombre</label>
									<div class="col-sm-7">
										<input type="text" 
											class="form-control" name="name" value="{{ old('name',$user->name)}}"
											autofocus>
										@if($errors->has('name'))
											<span class="error text-danger" for="input-name">
												{{$errors->first('name')}}
											</span>
										@endif
									</div>
								</div>
								<div class="row">
									<label for="username" class="col-sm-2 col-form-label">Nombre de usuario</label>
									<div class="col-sm-7">
										<input type="text"
											class="form-control"name="username" value="{{old('username',$user->username)}}"
											autofocus>
										@if($errors->has('username'))
											<span class="error text-danger" for="input-username">
												{{$errors->first('username')}}
											</span>
										@endif
									</div>
								</div>
								<div class="row">
									<label for="email" class="col-sm-2 col-form-label">Correo</label>
									<div class="col-sm-7">
										<input type="email"
											class="form-control" name="email" value="{{old('email',$user->email)}}"
											autofocus>
										@if($errors->has('email'))
											<span class="error text-danger" for="input-email">
												{{$errors->first('email')}}
											</span>
										@endif
									</div>
								</div>
								<div class="row">
									<label for="password" class="col-sm-2 col-form-label">Contraseña</label>
									<div class="col-sm-7">
										<input type="password"
											class="form-control" name="password"
											placeholder="ingrese la contraseña a cambiar" 
											autofocus>
										@if($errors->has('password'))
											<span class="error text-danger" for="input-password">
												{{$errors->first('password')}}
											</span>
										@endif
									</div>
								</div>
							</div>
							<div class="card-footer ml-auto mr-auto">
								<button class="btn btn-primary" type="submit">Editar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection