<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {

    public function delete(string $noteId)
    {
        $note = Note::where('id', $noteId)->first();
        $this->authorize('delete', $note);
        $note->delete();
    }

    public function with()
    {
        return [
            'notes' => Auth::user()->notes()->orderBy('send_date', 'ASC')->get(),
        ];
    }
}; ?>

<div>
    <div class="space-y-2">
        @if ($notes->isEmpty())
            <div class="text-center">
                <p class="text-xl font-bold">No Notes yet!</p>
                <p class="text-sm">Let create your first note by clicking the following button.</p>
                <x-button primary icon-right="plus" class="mt-6" href="{{ route('notes.create') }}" wire:navigate>Create
                    Note</x-button>
            </div>
        @else
            <x-button primary icon-right="plus" class="my-6" href="{{ route('notes.create') }}" wire:navigate>Create
                Note</x-button>
            <div class="grid grid-cols-3 gap-4">
                @foreach ($notes as $note)
                    <x-card wire:key='{{ $note->id }}'>
                        <div class="flex justify-between">
                            <div>
                                <a href="{{ route('notes.edit', $note) }}" wire:navigate class="text-xl font-bold hover:underline hover:text-blue-500">
                                    {{ $note->title }}
                                </a>
                                <p class="text-xs mt-2">{{ Str::limit($note->body, 30) }}</p>
                            </div>
                            <div class="text-xs text-gray-400">
                                {{ \Carbon\Carbon::parse($note->send_date)->format('d/M/Y') }}
                            </div>
                        </div>
                        <div class="flex items-end justify-between mt-4 space-x-1">
                            <p class="text-xs">Recipient : <span class="font-semibold">{{ $note->recipient }}</span></p>
                            <div>
                                <x-button.circle icon="eye"></x-button.circle>
                                <x-button.circle icon="trash" wire:click="delete('{{ $note->id }}')"></x-button.circle>
                            </div>
                        </div>
                    </x-card>
                @endforeach
            </div>
        @endif
    </div>
</div>
