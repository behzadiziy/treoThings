<x-modal-wrapper title="Unfriend">

    <div class="pb-6">
        Are you sure want to unfriend {{ $friend->name }}?
    </div>

    <div class="flex items-center justify-between">
        <x-primary-button wire:loading.attr="disabled" wire:click='unfriendUser'>
            <span wire:loading.remove>Unfriend</span>
            <span wire:loading>Unfriending ... </span>
        </x-primary-button>

        <x-secondary-button wire:click="$dispatch('closeModal')">
            close
        </x-secondary-button>
    </div>
</x-modal-wrapper>
