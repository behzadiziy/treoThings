<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-6 gap-6">
        <div class="col-span-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between space-y-3 mb-5">
                            <h2 class="text-lg font-semibold">MyFriends</h2>
                            <button
                                class="border border-gray-200 rounded-lg px-3 py-2 bg-gray-200 shadow-sm flex items-center justify-between space-x-3"
                                wire:click="$dispatch('openModal' , { component : 'modals.add-new-friend' })">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                                </svg>

                                <span>Add new friend</span>
                            </button>
                        </div>
                        <div class="space-y-3">
                            @forelse ($friends as $friend)
                                <div class="flex items-center justify-between">
                                    <a href="javascript:;">{{ $friend->name }}</a>
                                    <div class="space-x-3">
                                        <button
                                            wire:click="$dispatch('openModal' , {component : 'modals.unfriend' , arguments : { friend : {{ $friend }} }})">
                                            Unfriend
                                        </button>
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="text-gray-700 font-semibold text-center border border-gray-200 rounded-lg px-3 py-5 my-3">
                                    <p>No friends yet :(</p>
                                </div>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 space-y-6">
                    <div class="space-y-3">
                        <h2 class="text-lg font-semibold">Friends Request</h2>
                        <div class="space-y-3">
                            @forelse ($pendingFriendsFrom as $pendingRequestFrom)
                                <div class="flex items-center justify-between" wire:key="{{ $pendingRequestFrom->id }}">
                                    <a href="javascript:;">{{ $pendingRequestFrom->name }}</a>
                                    <div class="space-x-3">
                                        <button
                                            wire:click="acceptFriendRequest({{ $pendingRequestFrom->id }})">Accept</button>
                                        <button
                                            wire:click="$dispatch('openModal' , { component: 'modals.reject-friend-request' , arguments : { pendingRequestFrom : {{ $pendingRequestFrom }} } })">Reject</button>
                                    </div>
                                </div>
                            @empty
                                <span>You do not have friends request!</span>
                            @endforelse

                        </div>
                    </div>
                    <div class="space-y-3">
                        <h2 class="text-lg font-semibold">Pending Friends Request</h2>
                        <div class="space-y-3">
                            @forelse ($pendingFriendsTo as $pendingRequestTo)
                                <div class="flex items-center justify-between" wire:key="{{ $pendingRequestTo->id }}">
                                    <a href="javascript:;">{{ $pendingRequestTo->name }}</a>
                                    <div class="space-x-3">
                                        <button
                                            wire:click="$dispatch('openModal' , { component : 'modals.destroy-friend-request' , arguments: { pendingRequestTo : {{ $pendingRequestTo }} } })">
                                            Cancel
                                        </button>
                                    </div>


                                </div>
                            @empty
                                <span>You do not have sending request!</span>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
