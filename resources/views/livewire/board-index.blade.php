<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-4 gap-6">

        @forelse ($boards as $board)
            <a href="{{ route('boards.show', $board) }}"
                class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-36 flex items-end p-6 text-gray-900 text-lg">
                {{ $board->title }}
            </a>
        @empty
        @endforelse

        <button
            class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg h-36 flex items-center justify-center p-6 text-gray-900 text-lg space-x-1"
            wire:click="$dispatch('openModal' , {component : 'modals.create-board'})">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>

            <span>New Board</span>
        </button>

    </div>
</div>
