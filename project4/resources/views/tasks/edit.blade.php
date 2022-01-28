<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Task') }}
        </h2>
    </x-slot>

    <div>
    	<div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
    		<div class="mt-5 md:mt-0 md:col-span-2">
    			<form action="{{route('tasks.update',$task)}}">
    				@csrf
    				<div class="shadow overflow-hidden sm:rounded-md">
    					<div class="px-4 py-5 bg-white sm:p-6">
    						<label for="description" class="block font-medium text-sm text-gray-700">Description</label>
    						<input
    							class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
    							type="text" name="description" id="description" value="{{$task->description}}">
    						@error('description')
    							<p class="text-sm text-red-600">{{$message}}</p>
    						@enderror
    					</div>
    				</div>
    				<div class="flex items-center justify-end px-4 py-3 bg-white text-white">
    					<button class="inline-flex items-center px-4 py-2 bg-gray-800 border-gray-300 text-white">
    						Update Task
    					</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>

</x-app-layout>