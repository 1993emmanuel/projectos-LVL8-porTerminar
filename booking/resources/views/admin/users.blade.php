<x-app-layout>
    {{-- this is from the admin folder --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}
                {{-- this is in views livewire folder --}}
                {{-- this is from the livewire folder and this is all components --}}
                @livewire('users')
            </div>
        </div>
    </div>
</x-app-layout>