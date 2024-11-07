<x-modal-wrapper title="Reject friend request">

    <div class="pb-6">
        Are you sure want to reject this request from {{ $pendingRequestFrom->name }}?
    </div>

    <div class="flex items-center justify-between">
        <x-primary-button wire:loading.attr="disabled" wire:click='rejectRequest'>
            <span wire:loading.remove>Reject request</span>
            <span wire:loading>Rejecting ... </span>
        </x-primary-button>

        <x-secondary-button wire:click="$dispatch('closeModal')">
            close
        </x-secondary-button>
    </div>
</x-modal-wrapper>
