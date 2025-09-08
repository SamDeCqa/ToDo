<div class="py-6 px-2 h-screen">

    <button wire:click="back" class="flex gap-2 text-gray-500 mb-4 hover:text-gray-600">
        <x-heroicon-s-chevron-left class="w-6 h-6 text-gray-600" />Back
    </button>

    <p class="text-3xl text-blue-500 font-bold">Edit profile</p>

    
    
    <div class="w-full  flex justify-center items-center h-full px-4">
        <form wire:submit.prevent="profileUpdate" class="lg:w-96">
            @if ($errors->any())
                    <ul class="bg-red-200 border border-red-300 mb-2 p-2 space-y-2 w-96 mx-auto">
                @foreach ($errors->all() as $error)
                    <li class="text-red-600 italic text-center text-sm font-medium">{{ $error ?? 'Error'}}</li>
                @endforeach
            </ul>        
            @endif

            <div class="relative w-24 h-24 mx-auto rounded-full mb-6 overflow-hidden border-2 border-gray-400">
                @if ($photo)
                <img src="{{ $photo->temporaryUrl() }}"
                    class="w-24 h-24 rounded-full object-cover"
                    alt="Preview" @click="$refs.photoInput.click()" >
                @else
                <img src="{{ Auth::user()->profile_pic ? asset('storage/' . Auth::user()->profile_pic) : '../images/profile_default.png' }}"
                    class="w-24 h-24 rounded-full object-cover"
                    alt="Profile" @click="$refs.photoInput.click()">
                @endif

                <input
                    type="file"
                    wire:model="photo"
                    class="hidden"
                    x-ref="photoInput">

                <x-heroicon-s-pencil
                    class="w-6 h-6 absolute bottom-1 right-2 text-white bg-blue-500 p-1 rounded-full shadow-md cursor-pointer hover:bg-blue-600"
                    @click="$refs.photoInput.click()" />
            </div>


            <div class="space-y-6 font-medium text-gray-800 mb-6">
                <input type="text" wire:model="name"
                    class="w-full h-12 border border-gray-200 px-4 rounded-full focus:outline-none focus:border-2 focus:border-blue-500 transition duration-700"
                    value="{{ Auth::user()->name }}">

                <input type="email" wire:model="email"
                    class="w-full h-12 border border-gray-200 px-4 rounded-full focus:outline-none focus:border-2 focus:border-blue-500 transition duration-700"
                    value="{{ Auth::user()->email }}">

                <input type="tel" wire:model="phone"
                    class="w-full h-12 border border-gray-200 px-4 rounded-full focus:outline-none focus:border-2 focus:border-blue-500 transition duration-700"
                    value="{{ Auth::user()->phone }}">

                <input type="password" wire:model="password"
                    class="w-full h-12 border border-gray-200 px-4 rounded-full focus:outline-none focus:border-2 focus:border-blue-500 transition duration-700"
                    placeholder="New password" autocomplete="off">

                <input type="password" wire:model="passwordConfirmation"
                    class="w-full h-12 border border-gray-200 px-4 rounded-full focus:outline-none focus:border-2 focus:border-blue-500 transition duration-700"
                    placeholder="Confirm password">
            </div>

            <!-- Action buttons -->
            <div class="flex w-full justify-between">
                <button type="button" class="text-blue-400 font-medium px-4 border border-blue-500 rounded-lg">
                    Cancel
                </button>

                <button type="submit" class="w-32 px-4 bg-blue-400 rounded-lg text-white font-medium hover:bg-blue-500 active:scale-95 transition duration-300">
                    Save
                    {{-- <div wire:loading>
                        <x-heroicon-o-check class="w-8 h-8">
                    </div> --}}
                </button>
            </div>
        </form>
    </div>
</div>