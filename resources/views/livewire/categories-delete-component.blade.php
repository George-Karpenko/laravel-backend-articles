<x-jet-dialog-modal wire:model="isModalDeleteVisible">
    <x-slot name="title">
        {{ __('Delete category') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to delete this category? Once the category is deleted, all of its resources and data will be permanently deleted.') }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('isModalDeleteVisible')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
            {{ __('Delete category') }}
        </x-jet-danger-button>
        <div x-data="{ open: false }" @name-updated.window="console.log(open)">
            <!-- Modal with a Livewire name update form -->
        </div>
    </x-slot>
</x-jet-dialog-modal>
