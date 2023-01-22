<div x-data="{
    isOpen: false,
    value: @entangle($attributes->wire('model')),
    options: {{ json_encode($options) }},
    focusedOptionValue: this.value,
    open() {
        this.focusedOptionValue = this.value
        this.isOpen = true;
    },
    valueUpdata(value) {
        this.value = value;
        this.isOpen = false;
    },
    focusPrevOption() {
        if (!this.isOpen) {
            return;
        }
        const focusedOptionIndex = this.focusOptionIndex();
        if (index > 0) {
            this.focusedOptionValue = this.options[index - 1].value;
        }
    },
    selectOption() {
        if (!this.isOpen) {
            this.isOpen = true;
            return;
        }
        this.value = this.focusedOptionValue
        this.isOpen = false;
    },
    focusNextOption() {
        if (!this.isOpen) {
            return;
        }
        const focusedOptionIndex = this.focusOptionIndex();
        if (focusedOptionIndex < this.options.length - 1) {
            this.focusedOptionValue = this.options[focusedOptionIndex + 1].value;
        }
    },
    focusOptionIndex() {
        let focusedOptionIndex;
        for (index = 0; index < this.options.length; ++index) {
            if (this.options[index].value === this.focusedOptionValue) {
                focusedOptionIndex = index;
                break;
            }
        }
        return focusedOptionIndex;
    },
    classOption(value, index) {
        const isSelected = this.value === value;
        const isFocused = index === this.focusOptionIndex();
        return {
            'cursor-pointer w-full border-gray-100 border-b hover:bg-blue-50': true,
            'bg-blue-100': isSelected,
            'bg-blue-50': isFocused
        };
    }
}" class="relative">
    <input type="button" @click="open()" @keydown.enter.stop.prevent="selectOption()" @blur="isOpen = false"
        @keydown.arrow-up.prevent="focusPrevOption()" @keydown.arrow-down.prevent="focusNextOption()"
        :value="value"
        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm py-2 px-3 border w-full" />
    <template x-if="isOpen">
        <ul class="absolute w-full bg-white">
            <template x-for="(option, index) in options" :key="index">
                <li @mousedown.prevent="valueUpdata(option.value)" x-text="option.name" class="py-2 px-3 border"
                    :class="classOption(option.value, index)" :aria-selected="focusedOptionValue === value">
                </li>
            </template>
        </ul>
    </template>
</div>
