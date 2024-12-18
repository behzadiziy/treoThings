<div>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $board->title }}
            </h2>
            <x-dropdown>
                <x-slot name="trigger">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>

                </x-slot>
                <x-slot name="content">
                    <x-dropdown-button class="flex items-center space-x-2"
                        x-on:click="Livewire.dispatch('openModal' , {component: 'modals.card-archive' , arguments: { 'board': {{ $board->id }} } })">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                        </svg>
                        <span>Archived Cards</span>
                    </x-dropdown-button>

                    <x-dropdown-button class="flex items-center space-x-2"
                        x-on:click="Livewire.dispatch('openModal' , {component: 'modals.column-archive' , arguments: { 'board': {{ $board->id }} } })">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                        </svg>

                        <span>Archived Columns</span>
                    </x-dropdown-button>

                    @if (auth()->id() === $board->owner_id)
                        <x-dropdown-button class="flex items-center space-x-2"
                            x-on:click="Livewire.dispatch('openModal' , {component: 'modals.add-friends-to-board', arguments: { 'board': {{ $board->id }} } })">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                            </svg>
                            <span>Share</span>

                        </x-dropdown-button>
                    @elseif ($board->users)
                        <x-dropdown-button class="flex items-center space-x-2"
                            x-on:click="Livewire.dispatch('openModal' , {component: 'modals.left-from-board', arguments: { 'board': {{ $board->id }} } })">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5 text-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                            </svg>

                            <span class="text-red-500">Leave</span>

                        </x-dropdown-button>
                    @endif

                </x-slot>
            </x-dropdown>
        </div>
    </x-slot>

    <div class="w-full p-6 overflow-x-scroll">
        <div class="flex w-max space-x-6 h-[calc(theme('height.screen')-64px-73px-theme('padding.12'))]"
            wire:sortable="sorted" wire:sortable-group="moved" wire:sortable.options="{ ghostClass: 'opacity-30' }">

            @foreach ($columns as $column)
                <div wire:key="{{ $column->id }}" wire:sortable.item="{{ $column->id }}">
                    <livewire:column :key="$column->id" :column="$column">
                </div>
            @endforeach

            <div x-data="{ adding: false }" x-on:column-create.window="adding=false">
                <template x-if="adding">
                    <form wire:submit='createColumn' class="bg-white shadow-sm px-4 py-3 rounded-lg w-[260px]">
                        <div>
                            <x-input-label for="title" value="Title" class="sr-only" />
                            <x-text-input id="title" placeholder="Column Title" class="w-full"
                                wire:model='createColumnForm.title' x-init="$el.focus()" />
                            <x-input-error :messages="$errors->get('createColumnForm.title')" class="mt-1" />
                        </div>
                        <div class="flex items-center space-x-2 mt-2">
                            <x-primary-button>
                                Create
                            </x-primary-button>

                            <button type="button" class="text-sm text-gray-500" x-on:click="adding=false">
                                Cancel
                            </button>
                        </div>
                    </form>
                </template>
                <button x-show="!adding" x-on:click="adding=true"
                    class="bg-gray-200 shadow-sm px-4 py-3 flex items-center space-x-1 rounded-lg w-[260px]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>

                    <span>Add a column</span>
                </button>
            </div>

        </div>
    </div>

</div>
