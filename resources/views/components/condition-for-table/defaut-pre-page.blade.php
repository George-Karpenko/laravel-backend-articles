<div class="flex-auto">
    <x-jet-label for="prePage" value="{{ __('Per page') }}" />
    <x-select id="prePage" class="w-full" {{ $attributes }}>
        <option class="block px-3 py-2" value="5">
            5
        </option>
        <option class="block px-3 py-2" value="10">
            10
        </option>
        <option class="block px-3 py-2" value="20">
            20
        </option>
    </x-select>
</div>
