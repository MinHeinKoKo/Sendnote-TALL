<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a new note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl space-y-4 mx-auto sm:px-6 lg:px-8">
                <x-button info icon="arrow-left" class="mb-4" href="{{ route('notes.index') }}" >All Notes</x-button>
                {{-- {{ __("You're logged in!") }} --}}
                <livewire:notes.create-note />
                {{-- <livewire:notes.show-notes /> --}}
        </div>
    </div>
</x-app-layout>
