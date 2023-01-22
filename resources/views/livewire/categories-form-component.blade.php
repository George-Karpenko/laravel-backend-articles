<x-jet-dialog-modal wire:model="modalFormVisible">

    <x-slot name="title">
        @if ($category && $category->id)
            {{ __('Update category') }} {{ $category->id }}
        @else
            {{ __('Create category') }}
        @endif
    </x-slot>

    <x-slot name="content">
        <div>
            <x-jet-label for="category.title" value="{{ __('Title') }}" />
            <x-jet-input id="category.title" class="block mt-1 w-full" type="text" name="category.title"
                wire:model.lazy="category.title" required autofocus />
            <x-jet-input-error for="category.title" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        @if ($category && $category->id)
            <x-jet-button class="ml-3" wire:click="storeOrEdit" wire:loading.attr="disabled">
                {{ __('Update') }}
            </x-jet-button>
        @else
            <x-jet-button class="ml-3" wire:click="storeOrEdit" wire:loading.attr="disabled">
                {{ __('Create') }}
            </x-jet-button>
        @endif
    </x-slot>
</x-jet-dialog-modal>
