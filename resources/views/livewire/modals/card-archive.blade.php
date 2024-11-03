<x-modal-wrapper title="Archived Cards">
    <div class="max-h-96 overflow-y-scroll space-y-2">
        @forelse ($cards as $card)
            <div class="border border-gray-200 rounded-lg px-3 py-2 flex item-centeer justify-between">
                <div>
                    {{ $card->title }}
                </div>
                <button class="text-sm text-gray-500" wire:click="unarchiveCard({{ $card->id }})">Put back</button>
            </div>
        @empty
            <p>You have no archived cards</p>
        @endforelse
    </div>
</x-modal-wrapper>
