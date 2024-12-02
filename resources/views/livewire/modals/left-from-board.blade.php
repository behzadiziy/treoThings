<x-modal-wrapper title="Left from the board">

    <div class="pb-6">
        Are you sure want to leave from this board?
    </div>

    <div class="flex items-center justify-between">
        <x-primary-button wire:loading.attr="disabled" wire:click='leaveTheBoard'>
            <span wire:loading.remove>Leave</span>
            <span wire:loading>Leaving ... </span>
        </x-primary-button>

        <x-secondary-button wire:click="$dispatch('closeModal')">
            close
        </x-secondary-button>
    </div>
</x-modal-wrapper>
