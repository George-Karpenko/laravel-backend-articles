@props(['options', 'label', 'id'])

<div class="flex-auto" x-data="{ sort: @entangle($attributes->wire('model')) }">
    <x-jet-label for="{{ $id }}" value="{{ $label }}" />
    <div class="flex gap-1 items-center">
        <x-select id="{{ $id }}" x-model="sort" class="flex-auto" :options="$options" />
    </div>
</div>
