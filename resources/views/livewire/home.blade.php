<div>

    <div class="lg:flex justify-between">
        <p class="text-2xl font-medium">Welcome, {{ Auth()->User()->name ??'Samwel'}}</p>
        <div class="flex justify-end sm:mt-4">
            <!-- <p class="justify-end">Sat, Aug 12 2025</p> -->
            <div class="flex gap-4">
                <img src="{{asset('storage/'.Auth()->user()->profile_pic)}}" class="w-12 h-12 rounded-full" alt="Your Photo">
                <div class="flex-col text-sm">
                    <p class="text-gray-800">{{ Auth()->User()->name ??'Samwel'}}</p>
                    <p class="text-gray-400">{{ Auth()->User()->email ??'samwel@gmail.com'}}</p>
                </div>
            </div>
        </div>
    </div>

    @livewire('overview-stats')

    <div class="flex justify-start gap-4 my-6">
        <button @click="showRecents = true; showFavourites = false" class="text-sm flex items-center-safe gap-2 text-gray-700 font-medium  px-4 py-2 rounded-xl" :class="showRecents ? 'bg-gray-300' : 'hover:bg-blue-100'">
            <x-heroicon-o-clock class="w-5 h-5" />
            Recently
        </button>

        <button @click="showRecents = false; showFavourites = true" class="text-sm flex items-center gap-2 text-gray-700 font-medium px-4 py-2  rounded-xl transition duration-500" :class="showFavourites ? 'bg-gray-300' : 'hover:bg-blue-100'">
            <x-heroicon-o-star class="w-5 h-5" />
            Favourites
        </button>
    </div>

    <div x-show="showRecents">
        @livewire('recents-component')
    </div>

    <div x-show="showFavourites">
        @livewire('favourites-component')
    </div>

</div>