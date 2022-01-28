<div class="divide-y divide-gray-800" x-data="{ show:false }">

	<nav class="flex items-center bg-gray-700 py-2 shadow-lg">
		<div>
			<button 
				@click="show =! show"
				class="block h-8 mr-3 text-gray-400 item-center hover:text-gray-200 focus:text-gray-200 focus:outline-none sm:hidden">
				<svg class="w-8 fill-current" viewBox="0 0 24 24">                            
                    <path x-show="!show" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                   <path x-show="show" fill-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
				</svg>
			</button>
		</div>
		<div class="h-12 w-full flex items-center">
			<a href="{{ url('/') }}" class="w-full">
				<svg class="w-8 h-8 ml-4" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        			<path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5"></path>
        			<path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5"></path>
    			</svg>
			</a>
		</div>
		<div class="flex justify-end sm: w-8/12">
			<ul class="hidden sm:flex sm:text-left text-gray-200 text-xs">
				@foreach($topnav as $itemTop)
					<a href="{{url('/'.$itemTop->slug)}}">
						<li class="cursor-pointer px-4 py-2 hover:underline">{{$itemTop->label}}</li>
					</a>
				@endforeach
				<a href="{{url('/login')}}"><li class="cursor-pointer px-4 py-2 hover:underline">login</li></a>
			</ul>
		</div>
	</nav>

	<div class="sm:flex sm:min-h-screen">
		<aside class="bg-gray-700 text-gray-900 divide-y divide-gray-700 divide-dashed sm:w-4/12 md:w-3/12 lg:w-2/12">
			{{-- Desktop web View --}}
			<ul class="hidden text-gray-200 text-sm sm:block sm:text-left">
				@foreach($sidebarLink as $itemLink)
					<a href="{{url('/'.$itemLink->slug)}}">
						<li class="cursor-pointer px-4 py-2 hover:bg-gray-800">{{$itemLink->label}}</li>
					</a>
				@endforeach
			{{-- Mobile web View --}}
			<div :class="show ? 'block' : 'hidden'" 
				class="pb-3 divide-y divide-gray-800 block sm:hidden">
				<ul class="text-gray-200 text-sm">
					@foreach($sidebarLink as $itemLink)
						<a href="{{url('/'.$itemLink->slug)}}">
							<li class="cursor-pointer px-4 py-2 hover:bg-gray-800">{{$itemLink->label}}</li>
						</a>
					@endforeach
{{-- 					<a href="{{url('/about')}}"><li class="cursor-pointer px-4 py-2 hover:bg-gray-800">About</li></a>
					<a href="{{url('/contact')}}"><li class="cursor-pointer px-4 py-2 hover:bg-gray-800">Contact</li></a> --}}
				</ul>
				{{-- top navigation web view --}}
				<ul class="text-gray-200 text-sm">
					@foreach($topnav as $itemTop)
						<a href="{{url('/'.$itemTop->slug)}}">
							<li class="cursor-pointer px-4 py-2 hover:underline">{{$itemTop->label}}</li>
						</a>
					@endforeach
					<a href="{{url('/login')}}"><li class="cursor-pointer px-4 py-2 hover:bg-gray-800">Login</li></a>
				</ul>
			</div>
		</aside>

		<main class="bg-gray-100 p-12 min-h-screen sm:w-8/12 md:w-9/12 lg:w-10/12">
			<section class="divide-y text-gray-900">

				<h1 class="text-3xl font-bold">{{$title}}</h1>
				<article>
					<div class="mt-5 text-sm">
						{!! $content !!}
					</div>
				</article>

			</section>
		</main>


	</div>

</div>
