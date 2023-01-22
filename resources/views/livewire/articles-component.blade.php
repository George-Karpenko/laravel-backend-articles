<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
    <div class="mb-4 sm:mb-6 flex justify-end">
        <a href="{{ route('articles-form') }}" class="button">
            {{ __('Create') }}
        </a>
    </div>
    <x-condition-for-table>
        <x-condition-for-table.defaut-search wire:model.debounce.500ms="search" />
        <x-select-for-label id="filter_by_category" :label="__('Filter by category')" wire:model="filterByCategory" :options="$categories" />
        <x-select-for-label id="filter_by_author" :label="__('Filter by author')" wire:model="filterByAuthor" :options="$authors" />
        <x-condition-for-table.defaut-order-by wire:model="orderBy" :options="$columnsByWhichYouCanSort">
            <x-condition-for-table.defaut-is-order-asc wire:model="isOrderAsc" />
        </x-condition-for-table.defaut-order-by>
        <x-condition-for-table.defaut-pre-page wire:model="prePage" />
    </x-condition-for-table>

    @if (!count($articles))
        <h3 class="mt-4">{{ __('There is not a single article with this filtering.') }}</h3>
    @else
        <div class="overflow-x-auto mb-4">
            <x-table class="mt-4">
                <x-slot name="heading">
                    <x-table.heading>
                        {{ __('Title') }}
                    </x-table.heading>
                    @if (!$filterByCategory)
                        <x-table.heading>
                            {{ __('Category') }}
                        </x-table.heading>
                    @endif
                    @if (!$filterByAuthor)
                        <x-table.heading>
                            {{ __('Author') }}
                        </x-table.heading>
                    @endif
                    <x-table.heading>
                        {{ __('Date of publication') }}
                    </x-table.heading>
                    <x-table.heading class="table-head">
                    </x-table.heading>
                </x-slot>
                @foreach ($articles as $article)
                    <x-table.row>
                        <x-table.cell>
                            {{ $article->title }}
                        </x-table.cell>
                        @if (!$filterByCategory)
                            <x-table.cell>
                                {{ $article->category->title }}
                            </x-table.cell>
                        @endif
                        @if (!$filterByAuthor)
                            <x-table.cell>
                                {{ $article->author->fullName() }}
                            </x-table.cell>
                        @endif
                        <x-table.cell>
                            {{ $article->posted_at }}
                        </x-table.cell>
                        <x-table.cell class="flex justify-end gap-2">
                            {{-- <x-jet-button wire:click="updateShowModal({{ $article->id }})">
                            {{ __('Edit') }}
                        </x-jet-button>
                        <x-jet-danger-button wire:click="deleteShowModal({{ $article->id }})">
                            {{ __('Remove') }}
                        </x-jet-danger-button> --}}
                            <a href="{{ route('articles-form', $article->id) }}" class="button">
                                {{ __('Edit') }}
                            </a>
                            <x-jet-danger-button wire:click="deleteShowModal({{ $article->id }})">
                                {{ __('Remove') }}
                            </x-jet-danger-button>
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-table>
        </div>
        {{ $articles->links() }}
    @endif
</div>
