@if ($status)
    <x-jet-dialog-modal wire:model="modalStatusVisible">

        <x-slot name="title">
            {{ $status['title'] }}
        </x-slot>

        <x-slot name="content">
            <p>{{ $status['text'] }}</p>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalStatusVisible')" wire:loading.attr="disabled">
                {{ __('Okay') }}
            </x-jet-secondary-button>

        </x-slot>
    </x-jet-dialog-modal>
@endif
