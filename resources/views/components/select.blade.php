@props(['options'])

<select
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) }}>
    @if (isset($options))
        @foreach ($options as $option)
            <option value="{{ $option['value'] }}">
                {{ __($option['name']) }}
            </option>
        @endforeach
    @else
        {{ $slot }}
    @endif
</select>
