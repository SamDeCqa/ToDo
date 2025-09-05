<div>

            <div class="flex mt-6 gap-8 md:justify-center">
                <input type="text" placeholder="Search tasks..." wire:model="searchTerm"
                        class="bg-gray-200 border lg:w-96 border-gray-300 px-4 rounded-full h-12  md:h-14 focus:outline-none focus:border-2 focus:border-blue-500">
                <x-heroicon-o-magnifying-glass class="w-12 h-12 p-2 bg-gray-100 rounded-full"/>
            </div>

    
    
        <div class="flex justify-start gap-4 my-8">
            <a @click="showEvents = true; showMemos = false" class="text-sm text-gray-700 font-medium px-4 py-2 rounded-xl" :class="showEvents ? 'bg-gray-300' : 'hover:bg-blue-100'">Events</a>
            <a @click="showEvents = false; showMemos = true" class="text-sm text-gray-700 font-medium px-4 py-2 hover:bg-blue-100 rounded-xl transition duration-500" :class="showMemos ? 'bg-gray-300' : 'hover:bg-blue-100'">Memo</a>
        </div>

        <div x-show="showEvents">
            @livewire('events-component')
        </div>

        <div x-show="showMemos">
            @livewire('memo-component')
        </div>



</div>
