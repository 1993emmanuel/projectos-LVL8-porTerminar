<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Postys</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>
<body class="bg-gray-200">
	<nav class="p-6 bg-white flex justify-between mb-6">
		<ul class="flex items-center">
			<li>
				<a href="/" class="p-3">Home</a>
			</li>
			<li>
				<a href="{{route('dashboard')}}" class="p-3">Dashboard</a>
			</li>
			<li><a href="{{route('posts')}}" class="p-3">Posts</a></li>
			<li><a href="{{route('profile')}}" class="p-3">Profile</a></li>
		</ul>
		<ul class="flex items-center">
			@auth
				<li>
					<a href="" class="p-3">{{auth()->user()->name}}</a>
				</li>
				<li>
					<form action="{{route('logout')}}" method="post" class="p-3 inline">
						@csrf
						<button type="submit">LogOut</button>
					</form>
				</li>
			@endauth
			@guest
				<li>
					<a href="{{route('login')}}" class="p-3">Login</a>
				</li>
				<li>
					<a href="{{route('register')}}" class="p-3">Register</a>
				</li>			
			@endguest
		</ul>
	</nav>
	@yield('content')
</body>
</html>