<div class="p6"> 

    {{-- componente --}}

{{--     <div class="flex item-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createShowModal">
            {{ __('create menu') }}
        </x-jet-button>
    </div> --}}

    {{-- this is the table --}}
    <div class="flex flex-col">
        <div class="my-2 overflow-x-auto sm:mx-6 lg:-mx-8">
            <div class="py-2 aling-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    {{-- the data table --}}
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Role
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data->count())
                                @foreach($data as $item)
                                    <tr>
                                        <td class="px-6 py-2">{{$item->name}}</td>
                                        <td class="px-6 py-2">{{$item->email}}</td>
                                        <td class="px-6 py-2">{{$item->role}}</td>


                                        <td class="px-6 py-2 flex justify-end">
                                            <x-jet-button wire:click="updateShowModal({{$item->id}})">
                                                {{ __('Update') }}
                                            </x-jet-button>
                                            <x-jet-danger-button class="ml-2" wire:click="deleteShowModal({{$item->id}})">
                                                {{  __('Delete') }}
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
    
    <div class="mt-5">
        {{$data->links()}}
    </div>

    {{-- modal form --}}

    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Create or Update Form') }}
        </x-slot>

        <x-slot name="content">

            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input wire:model="name" id="" class="block mt-1 w-full" type="text" />
                @error('name') <span class="error">{{$message}}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label  for="role" value="{{ __('Role') }}" />
                <select wire:model="role" id="" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">--Select a Role--</option>
                    @foreach(App\Models\User::userRoleList() as $key=>$value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                @error('role') <span class="error">{{$message}}</span> @enderror
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
                {{__('Delete Permision')}}
            </x-slot>

            <x-slot name="content">
                {{__('Are you sure you want to delete this permission? Once the permission is delete...')}}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                    Nevermind
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                    Delete Permission
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>


</div>



</div>
