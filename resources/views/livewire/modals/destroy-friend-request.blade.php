<x-modal-wrapper title="Cancel friend request">

    <div class="pb-6">
        Are you sure want to cancel this request {{ $pendingRequestTo->name }}?
    </div>

    <div class="flex items-center justify-between">
        <x-primary-button wire:loading.attr="disabled" wire:click='cancelRequest'>
            <span wire:loading.remove>Cancel request</span>
            <span wire:loading>Canceling ... </span>
        </x-primary-button>

        <x-secondary-button wire:click="$dispatch('closeModal')">
            close
        </x-secondary-button>
    </div>
</x-modal-wrapper>
