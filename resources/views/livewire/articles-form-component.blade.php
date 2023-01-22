<x-page-form submit="storeOrEdit">
    <div class="col-span-6">
        <x-jet-label for="article.title" value="{{ __('Title') }}" />
        <x-jet-input id="article.title" class="block mt-1 w-full" type="text" name="article.title"
            wire:model.lazy="article.title" required autofocus />
        <x-jet-input-error for="article.title" class="mt-2" />
    </div>
    <div class="col-span-6">
        <div class="flex-auto">
            <x-jet-label for="article.category_id" value="{{ __('Category') }}" />
            <x-select id="article.category_id" wire:model="article.category_id" class="w-full mt-1" :options="$categories" />
        </div>
        <x-jet-input-error for="article.category_id" class="mt-2" />
    </div>
    <div class="col-span-6">
        <x-jet-label for="article.posted_at" value="{{ __('Date of publication') }}" />
        <x-jet-input id="article.posted_at" class="block mt-1 w-full" type="datetime-local" name="article.posted_at"
            wire:model.lazy="article.posted_at" />
        <x-jet-input-error for="article.posted_at" class="mt-2" />
    </div>
    <div class="col-span-6">
        <x-jet-label for="content" value="{{ __('Article') }}" />
        <x-decoupled-editor id="article.content" class="block mt-1 w-full" type="datetime-local" name="article.content"
            uploadUrl="{{ route('articles-upload-url') }}" wire:model="article.content" required autofocus />
        <x-jet-input-error for="article.content" class="mt-2" />
    </div>
    <x-slot name="actions">
        <a href="{{ route('articles') }}" class="secondary">
            {{ __('Cancel') }}
        </a>

        @if ($article && $article->id)
            <x-jet-button class="ml-3" wire:click="storeOrEdit" wire:loading.attr="disabled">
                {{ __('Update') }}
            </x-jet-button>
        @else
            <x-jet-button class="ml-3" wire:click="storeOrEdit" wire:loading.attr="disabled">
                {{ __('Create') }}
            </x-jet-button>
        @endif
    </x-slot>
</x-page-form>
