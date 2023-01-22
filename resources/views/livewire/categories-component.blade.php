<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
    <div class="mb-4 sm:mb-6 flex justify-end">
        <x-jet-button wire:click="createShowModal()">
            {{ __('Create') }}
        </x-jet-button>
    </div>
    <x-condition-for-table>
        <x-condition-for-table.defaut-search wire:model.debounce.500ms="search" />
        <x-condition-for-table.defaut-order-by wire:model="orderBy" :options="$columnsByWhichYouCanSort">
            <x-condition-for-table.defaut-is-order-asc wire:model="isOrderAsc" />
        </x-condition-for-table.defaut-order-by>
        <x-condition-for-table.defaut-pre-page wire:model="prePage" />
    </x-condition-for-table>

    @if (!count($categories))
        <h3 class="mt-4">{{ __('There is not a single category with this filtering.') }}</h3>
    @else
        <div class="overflow-x-auto">
            <x-table class="mt-4">
                <x-slot name="heading">
                    <x-table.heading>
                        {{ __('Title') }}
                    </x-table.heading>
                    <x-table.heading class="table-head">
                    </x-table.heading>
                </x-slot>
                @foreach ($categories as $category)
                    <x-table.row>
                        <x-table.cell>
                            {{ $category->title }}
                        </x-table.cell>
                        <x-table.cell class="flex justify-end gap-2">
                            <x-jet-button wire:click="updateShowModal({{ $category->id }})">
                                {{ __('Edit') }}
                            </x-jet-button>
                            <x-jet-danger-button wire:click="deleteShowModal({{ $category->id }})">
                                {{ __('Remove') }}
                            </x-jet-danger-button>
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-table>
        </div>
        {{ $categories->links() }}
    @endif
</div>
