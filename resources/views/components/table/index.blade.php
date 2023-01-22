<table {{ $attributes->merge(['class' => 'table-head']) }}>
    <thead>
        <tr>
            {{ $heading }}
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        {{ $slot }}
    </tbody>
</table>
