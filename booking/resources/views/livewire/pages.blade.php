<div class="p-6">
    {{-- pages livewire component --}}
    <div class="flex item-center justify-end px-4 text-right sm:px-6">
	    <x-jet-button wire:click="createShowModal">
	    	{{	__('create')	 }}
	    </x-jet-button>
    </div>

    {{-- this is the table --}}
    <div class="flex flex-col">
    	<div class="my-2 overflow-x-auto sm:mx-6 lg:-mx-8">
    		<div class="py-2 aling-middle inline-block min-w-full sm:px-6 lg:px-8">
    			<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
				    {{-- the data table --}}
				    <table class="min-w-full divide-y divide-gray-200">
				    	<thead>
				    		<tr>
				    			<th class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
				    			<th class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">Link</th>
				    			<th class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">Content</th>
				    		</tr>
				    	</thead>
				    	<tbody>
				    		@if($data->count())
				    			@foreach($data as $item)
						    		<tr>
						    			<td class="px-6 py-4 text-sm whitespace-no-wrap">
						    				{{ $item->title }}
						    				{!! $item->is_default_home ? '<span class="text-green-400 text-xs font-bold">[Default Home Page]</span>' : '' !!}
						    				{!! $item->is_default_not_found ? '<span class="text-red-400 text-xs font-bold">[Default 404]</span>' : '' !!}
						    			</td>
						    			<td class="px-6 py-4 text-sm whitespace-no-wrap">
						    				
						    				<a
						    					class="text-indigo-600 hover:text-indigo-900"
						    					target="_blank" 
						    					href="{{ URL::to('/'.$item->slug) }}">
						    					{{$item->slug}}
						    				</a>

						    			</td>
						    			<td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {!! \Illuminate\Support\Str::limit($item->content, 30, '....') !!}
                                        </td>
						    			<td class="px-6 py-4 text-right text-sm">
						    				<x-jet-button wire:click="updateShowModal({{$item->id}})">
						    					{{ __('Update') }}
						    				</x-jet-button>
						    				<x-jet-danger-button wire:click="deleteShowModal({{$item->id}})">
						    					{{	__('Delete') }}
						    				</x-jet-danger-button>
						    			</td>
						    		</tr>
				    			@endforeach
				    		@else
				    			<tr>
				    				<td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No result founds</td>
				    			</tr>
				    		@endif
				    	</tbody>
				    </table>
    			</div>
    		</div>
    	</div>
    </div>
    <br>
    {{$data->links()}}

    {{-- modal form --}}

	<x-jet-dialog-modal wire:model="modalFormVisible">
    	<x-slot name="title">
    		{{ __('Save Page') }}
    	</x-slot>

    	<x-slot name="content">
        	<div class="mt-4">
        		<x-jet-label for="title" value="{{	__('Title')	}}" />
        		<x-jet-input 
        			id="title" class="block mt-1 w-full"
        			type="text" wire:model.debounce.800ms="title"
        			placeholder="introduce el titulo"/>
        			@error('title')	<span class="error">{{$message}}</span>	@enderror
        	</div>
        	<div class="mt-4">
        		<x-jet-label for="slug" value="{{	__('Slug')	}}" />
        			<div class="mt-1 flex rounded-md shodow-sm">
        				<span class="inline-flex item-center px-3 rounded-1-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
        					http://localhost:800/
        				</span>
        				<input 
        					wire:model="slug" 
        					class="form-input flex-1 block w-full rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="url-slurg">
        			</div>
        		@error('slug')	<span class="error">{{$message}}</span>	@enderror
        	</div>

        	<div class="mt-4">
        		<label>
        			<input
        				class="form-checkbox"
        				value="{{ $isSetToDefaultHomePage }}" type="checkbox"
        				wire:model="isSetToDefaultHomePage" />
        			<span class="ml-2 text-sm text-gray-600">Set as the default home page</span>
        		</label>
        	</div>

        	<div class="mt-4">
        		<label>
        			<input
        				class="form-checkbox"
        				value="{{$isSetToDefaultNotFoundPage}}" type="checkbox" 
        				wire:model="isSetToDefaultNotFoundPage">
        		</label>
        		<span class="ml-2 text-sm text-red-600">Set as the 404 error</span>
        	</div>

        	<div class="mt-4">
        		<x-jet-label for="content" value="{{	__('Content')	}}" />
        		<div class="rounded-md shadow-sm">
        			<div class="mt-1 bg-white">
        				<div class="body-content" wire:ignore>
        					<trix-editor
        						class="trix-content"
        						x-ref="trix"
        						wire:model.debounce.10000ms="content"
        						wire:key="trix-content-unique-key"
        					>
        					</trix-editor>
        				</div>
        			</div>
        		</div>
        		@error('content')	<span class="error">{{$message}}</span>	@enderror
        	</div>
    	</x-slot>

    	<x-slot name="footer">
        	<x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
	            Cancelar
        	</x-jet-secondary-button>

        	@if($modalId)
	        	<x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
	            	Update
	        	</x-jet-button>
        	@else
	        	<x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
	            	Save
	        	</x-jet-button>
        	@endif

    	</x-slot>
	</x-jet-dialog-modal>


	{{-- Delete modal --}}
		<x-jet-confirmation-modal wire:model="modalConfirmDeleteVisible">
		    <x-slot name="title">
		        {{__('Delete Page')}}
		    </x-slot>

		    <x-slot name="content">
		        {{__('Are you sure you want to delete this page? Once the page is deleted...')}}
		    </x-slot>

		    <x-slot name="footer">
		        <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
		            Nevermind
		        </x-jet-secondary-button>

		        <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
		            Delete Page
		        </x-jet-danger-button>
		    </x-slot>
		</x-jet-confirmation-modal>


</div>
