<x-modal-wrapper title="Add Friends To Borad">
    <!-- Success message -->
    @if (session()->has('message'))
        <div class="my-4 p-3 text-green-700 bg-green-100 border border-green-300 rounded">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="shareWithFriend">
        <div class="mb-4">
            <label for="friendId" class="block text-gray-600 font-medium mb-2">Select Friend:</label>
            <x-select wire:model="friend_id" id="friendId">
                <option value="">Select Friend</option>
                @foreach ($friends as $friend)
                    <option value="{{ $friend->id }}">{{ $friend->name }}</option>
                @endforeach
            </x-select>

            @error('friendId')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="permission" class="block text-gray-600 font-medium mb-2">Permission Level:</label>
            <x-select wire:model="permission" id="permission">
                @foreach ($permissions as $permission)
                    <option value="{{ $permission }}">{{ $permission }}</option>
                @endforeach
            </x-select>
            @error('permission')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <x-primary-button>
            Add Friend To Board
        </x-primary-button>

        <div class="mt-4 mb-4 boreder ">
            <div class="font-semibold py-3">
                Friends that already added :
            </div>
            <div class="max-h-100 space-y-2">
                @forelse ($collaborations as $collaboration)
                    <div class="border border-gray-200 rounded-lg px-3 py-2 flex items-center justify-between">
                        <div class="flex items-center">
                            {{ $collaboration->name }}
                        </div>
                        <div class="flex items-center space-x-3">
                            <x-select wire:model="collaborationPermissions.{{ $collaboration->id }}"
                                wire:change="updatePermission({{ $collaboration->id }}, $event.target.value)">
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission }}"
                                        {{ $collaboration->permission == $permission ? 'selected' : '' }}>
                                        {{ $permission }}
                                    </option>
                                @endforeach
                            </x-select>
                            <button class="text-sm text-red-500"
                                wire:click="deleteUserFromBoard({{ $collaboration->id }})">Delete</button>
                        </div>
                    </div>
                @empty
                    <p>You have no archived cards</p>
                @endforelse

            </div>
        </div>
    </form>
</x-modal-wrapper>
