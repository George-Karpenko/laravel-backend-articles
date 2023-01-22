<div x-data="{
    open: @entangle($attributes->wire('model')),
    text: '{{ __('Asc') }}',
    trigger() {
        this.open = !this.open;
        this.text = '{{ __('Desc') }}';
        if (this.open) {
            this.text = '{{ __('Asc') }}';
        }
    }
}">
    <x-jet-button @click="trigger()" x-text="text" />
</div>
