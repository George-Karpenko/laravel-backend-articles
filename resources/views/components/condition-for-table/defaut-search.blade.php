<div class="grow-[3]">
    <x-jet-label for="search" value="{{ __('Search') }}" />
    <x-jet-input id="search" type="search" name="search" placeholder="{{ __('Search') }}"
        {{ $attributes->merge(['class' => 'w-full']) }} />
</div>
