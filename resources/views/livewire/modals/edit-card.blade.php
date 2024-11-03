<x-modal-wrapper title="Edit Card">
    <form wire:submit='updateCard' class="space-y-3">

        <div>
            <x-input-label for="title" value="Title" class="sr-only" />
            <x-text-input id="title" placeholder="Card Title" class="w-full" autofocus wire:model="editCardForm.title"/>
            <x-input-error :messages="$errors->get('editCardForm.title')" />
        </div>

        <div class="flex items-center justify-between">
            <x-primary-button>
                Save
            </x-primary-button>

            <x-secondary-button>
                Archive
            </x-secondary-button>
        </div>


    </form>
</x-modal-wrapper>
