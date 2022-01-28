@extends('layouts.app')

@section('content')
	
	<div class="flex justify-center">
		<div class="w-9/12">

			<div class="p-6">
				<h1 class="text-2xl font-medium mb-1">{{$user->name}}</h1>
				<p class="text-gray-500">
					Posted: {{$posts->count()}} {{Str::plural('post',$posts->count())}} and recived {{$user->recivedLikes->count()}} likes
				</p>
			</div>

			<div class="bg-white p-6 rounded-lg">
				@if($posts->count())
					@foreach($posts as $post)
						<x-post :post="$post" />
					@endforeach
					{{$posts->links()}}
				@else
					<p class="text-red-500 text-center">{{$user->name}} does not have posts yet!!!!</p>
				@endif
			</div>
		</div>
	</div>

@endsection