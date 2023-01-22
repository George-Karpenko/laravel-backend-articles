@props(['options'])

<div class="flex-auto" x-data="{ sort: @entangle($attributes->wire('model')) }">
    <x-jet-label for="sort" value="{{ __('Sort') }}" />
    <div class="flex gap-1 items-center">
        <x-select id="orderBy" x-model="sort" class="flex-auto" :options="$options" />
        {{ $slot }}
    </div>
</div>
