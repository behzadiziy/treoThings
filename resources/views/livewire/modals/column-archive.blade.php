<x-modal-wrapper title="Archived Columns">
    <div class="max-h-96 overflow-y-scroll space-y-2">
        @forelse ($columns as $column)
            <div class="border border-gray-200 rounded-lg px-3 py-2 flex item-centeer justify-between">
                <div>
                    {{ $column->title }}
                </div>
                <button class="text-sm text-gray-500" wire:click="unarchiveColumn({{ $column->id }})">Put back</button>
            </div>
        @empty
            <p>You have no archived column.</p>
        @endforelse
    </div>
</x-modal-wrapper>
