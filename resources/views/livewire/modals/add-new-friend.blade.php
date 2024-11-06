<x-modal-wrapper title="Add a new friend">

    <form wire:submit='sendRequest' class="space-y-3">

        @if (session('error'))
            <div class="flex items-center p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                <!-- Heroicon for the alert icon (exclamation-circle) -->
                <svg class="w-5 h-5 mr-2 text-red-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12.41c0 4.418-3.582 8-8 8s-8-3.582-8-8 3.582-8 8-8 8 3.582 8 8z" />
                </svg>
                <!-- Alert message content -->
                {{ session('error') }}
            </div>
        @endif

        <div>
            <x-input-label for="email" value="User Email" class="sr-only" />
            <x-text-input id="email" placeholder="Enter the user email" class="w-full" autofocus
                wire:model="addNewFriendForm.email" />
            <x-input-error :messages="$errors->get('addNewFriendForm.email')" class="mt-1" />
        </div>

        <x-primary-button>
            Find
        </x-primary-button>
    </form>

</x-modal-wrapper>
