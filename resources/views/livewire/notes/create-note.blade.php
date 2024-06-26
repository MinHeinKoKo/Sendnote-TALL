<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;

    public function submit()
    {
        $validated = $this->validate([
            'noteTitle' => 'required|string|min:5',
            'noteBody' => 'required|string|min:20',
            'noteRecipient' => 'required|email',
            'noteSendDate' => 'required|date',
        ]);
        // dd($this->noteTitle, $this->noteBody, $this->noteRecipient, $this->noteSendDate);

        auth()
            ->user()
            ->notes()
            ->create([
                'title' => $this->noteTitle,
                'body' => $this->noteBody,
                'recipient' => $this->noteRecipient,
                'send_date' => $this->noteSendDate,
                'is_published' => true,
            ]);

        redirect(route('notes.index'));
    }
}; ?>

<div>
    <form wire:submit='submit' class="space-y-4">
        <x-input wire:model="noteTitle" label="Note Title" placeholder="Today is sunny" />
        <x-textarea wire:model="noteBody" label="Your note Body"
            placeholder="Share your thoughts with your friends here." />
        <x-input icon="user" wire:model="noteRecipient" label="Recipient" placeholder="yourfriend@gmail.com"
            type="email" />
        <x-input icon="calendar" wire:model="noteSendDate" type="date" label="Send Date" />
        <div class="pt-4">
            <x-button primary wire:click='submit' right-icon="calendar" spinner>Schedule Note</x-button>
        </div>
        <x-errors />
    </form>
</div>
