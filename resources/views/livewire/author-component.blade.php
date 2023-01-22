<x-jet-form-section submit="storeOrEdit">
    <x-slot name="title">
        @if ($author->id)
            {{ __('Update Author') }}
        @else
            {{ __('Create Author') }}
        @endif
    </x-slot>

    <x-slot name="description">
        @if ($author->id)
            {{ __("You can change the author's first and last name.") }}
        @else
            {{ __('Create an author to publish articles.') }}
        @endif
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="author.first_name" value="{{ __('First name') }}" />
            <x-jet-input id="author.first_name" type="text" class="mt-1 block w-full"
                wire:model.defer="author.first_name" autocomplete="author.first_name" />
            <x-jet-input-error for="author.first_name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="author.last_name" value="{{ __('Last Name') }}" />
            <x-jet-input id="author.last_name" type="text" class="mt-1 block w-full"
                wire:model.defer="author.last_name" autocomplete="author.last_name" />
            <x-jet-input-error for="author.last_name" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
