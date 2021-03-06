<div class="p6">
    
	<div class="flex item-center justify-end px-4 py-3 text-right sm:px-6">
		<x-jet-button wire:click="createShowModal">
			{{ __('create menu') }}
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
				    			<th class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">Type</th>
				    			<th class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">Sequence</th>
				    			<th class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">label</th>
				    			<th class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">Url</th>
				    			<th class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
				    		</tr>
				    	</thead>
				    	<tbody>
				    		@if($data->count())
				    			@foreach($data as $item)
					    			<tr>
					    				<td class="px-6 py-2">{{$item->type}}</td>
					    				<td class="px-6 py-2">{{$item->sequence}}</td>
					    				<td class="px-6 py-2">{{$item->label}}</td>
					    				<td class="px-6 py-2">
					    					<a 
					    						href="{{Url($item->slug)}}"
					    						target="_blank"
					    						class="text-indigo-600 hover:text-indigo-900">
					    							{{$item->slug}}
					    					</a>
					    				</td>
					    				<td class="px-6 py-2 flex justify-end">
						    				<x-jet-button wire:click="updateShowModal({{$item->id}})">
						    					{{ __('Update') }}
						    				</x-jet-button>
						    				<x-jet-danger-button class="ml-2" wire:click="deleteShowModal({{$item->id}})">
						    					{{	__('Delete') }}
						    				</x-jet-danger-button>
					    				</td>
					    			</tr>
				    			@endforeach
				    		@else
				    			<td class="px-6 py-4 text-sm whitespace-no-wrap">No hay registros en el sistema</td>
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
    		{{ __('Navigation Menu item') }}
    	</x-slot>

    	<x-slot name="content">

    		<div class="mt-4">
    			<x-jet-label for="label" value="{{ __('Label') }}" />
    			<x-jet-input wire:model="label" id="label" class="block mt-1 w-full" type="text" />
    			@error('label')	<span class="error">{{$message}}</span>	@enderror
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
    			<x-jet-label for="sequence" value="{{ __('Sequence') }}" />
    			<x-jet-input wire:model="sequence" id="sequence" class="block mt-1 w-full" type="text" />
    			@error('sequence')	<span class="error">{{$message}}</span>	@enderror
    		</div>

    		<div class="mt-4">
    			<x-jet-label  for="type" value="{{ __('type') }}" />
    			<select wire:model="type" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
    				<option class="SidebarNav">SidebarNav</option>
    				<option class="TopNav">TopNav</option>
    			</select>
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
		        {{__('Delete Navigation')}}
		    </x-slot>

		    <x-slot name="content">
		        {{__('Are you sure you want to delete this navigation? Once the nave is deleted...')}}
		    </x-slot>

		    <x-slot name="footer">
		        <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
		            Nevermind
		        </x-jet-secondary-button>

		        <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
		            Delete Navigation
		        </x-jet-danger-button>
		    </x-slot>
		</x-jet-confirmation-modal>


</div>



</div>
