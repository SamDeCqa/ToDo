<div>
    
    <div class="flex mt-6 gap-8 md:justify-center">
                <input type="text" placeholder="Search Memos..." wire:model.live.debounce.300ms="searchTerm"
                        class="bg-gray-200 border lg:w-96 border-gray-300 px-4 rounded-full h-12  md:h-14 focus:outline-none focus:border-2 focus:border-blue-500">
                <x-heroicon-o-magnifying-glass class="w-12 h-12 p-2 bg-gray-100 rounded-full"/>
    </div>

    <div class="flex justify-between mt-4">
        <p class="text-3xl font-bold">Memos</p>
        <div class="flex gap-4">
            <button type="button" class="bg-blue-600 hover:bg-blue-700 w-32 h-12 rounded-lg text-white font-semibold transition duration-300">New Memo</button>
        </div>
    </div>

    <div class="my-4">
      <!-- HAPA NILIWEKA LINKS ZA PAGINATION -->
    </div>

    <div class="grid lg:grid-cols-7 gap-4">
        @forelse ($memos as $memo)
        <div class="bg-gray-100 col-span-3 px-2 lg:px-4 py-3 rounded-xl hover:shadow-md transition duration-500" x-data="{fav : false,}">
            <div class="flex justify-between">
                <p class="text-gray-400 text-sm">{{$memo->created_at->diffForHumans()}}</p>
                <button
                    @click="selectedMemo=@js($memo);memoDetails = true"
                    class="text-blue-600 text-sm font-semibold cursor-pointer">
                    See details
                </button>
            </div>

            <div class="flex justify-between items-center p-2 md:p-4 bg-[#FDFDFD] rounded-xl mt-4">
                <div class="flex-col text-xs text-gray-800 font-medium">
                    <p class="text-xl font-semibold">{{ $memo->title }}</p>
                    <div class="bg-[#FDFDFD] grid justify-between my-2 rounded-lg text-sm">
                        <p class="text-sm font-medium">Description:</p>
                        <p class="w-full h-12 max-h-24 text-sm font-thin">{{ $memo->info }}</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-between text-xs mt-2">
                <button
                    class="hover:bg-amber-50 p-2 rounded-full transition duration-300"
                    wire:click="toggleFavourite({{$memo->id}})">

                     @if ($memo->is_favourite === 1)
                         <x-heroicon-s-star class="w-5 h-5 text-amber-500"/>
                     @else
                         <x-heroicon-o-star class="w-5 h-5 text-gray-600"/>
                     @endif
                </button>
                <div>
                    <button class="hover:bg-blue-100 p-2 rounded-full text-blue-400 hover:text-blue-500 transition duration-300">
                        <x-heroicon-o-pencil class="w-5 h-5" />
                    </button>
                    <button class="hover:bg-red-100 p-2 rounded-full text-red-400 hover:text-red-500 transition duration-300" @click="selectedMemo = { id: '{{$memo->id}}', name: '{{$memo->title}}'};showDeleteMemo = true">
                        <x-heroicon-o-trash class="w-5 h-5" />
                    </button>
                </div>
            </div>
        </div>
        @empty
            <div class="w-full bg-blue-100 max-w-md lg:max-w-5xl mx-auto">
                <div class="p-4 rounded-xl text-center w-full max-w-2xl mx-auto">
                    <p class="text-3xl font-medium">Empty</p>
                    <x-heroicon-o-face-frown class="w-12 h-12 mx-auto my-4" />
                    <p class="text-xl mt-4">No Memos Yet</p>
                </div>
            </div>
        @endforelse
    </div>

    <div class="my-4 w-3/4">
              <!-- HAPA NILIWEKA LINKS ZA PAGINATION -->
    </div>

    <!-- Details Modal -->
     <div class="fixed inset-0 backdrop-blur-xs opacity-100 z-40 w-full h-full flex justify-center items-center" x-show="memoDetails" x-cloak x-transition.duration.500ms>
        
        <div class="relative z-50 bg-white p-4 w-96 space-y-6" x-show="memoDetails" @click.outside="memoDetails = false">
            <div class="flex justify-end">
                <x-heroicon-s-x-mark class="w-8 h-8 text-gray-600 cursor-pointer" @click="memoDetails = false" />
            </div>
            <p class="text-3xl font-bold text-blue-600"><span x-text="selectedMemo.title"></span></p>
            <div class="flex-col gap-2">
                <!-- <p class="font-semibold text-blue-500">Description:</p> -->
                <span class="font-thin text-gray-800" x-text="selectedMemo.info"></span>
            </div>
        </div>
     </div>

    <!-- DELETE MODAL -->
    <div class="fixed overlay backdrop-blur-xs inset-0 z-40 w-full flex h-full justify-center bg-opacity-75" x-show="showDeleteMemo" x-cloak x-transition.duration.300ms>
        <div class="relative p-4 rounded-2xl bg-[#FDFDFD] w-64 lg:w-96 h-fit mt-4 z-50" @click.outside="showDeleteMemo = false">
            <p class="font-medium">Delete</p>
            <hr class="my-2">
            <x-heroicon-o-exclamation-triangle class="w-24 h-24 text-red-600 rounded-full bg-red-100 items-center p-6 mx-auto" />

            <p class="text-sm mt-4">Do you really want to delete "<span class="italic font-bold" x-text="selectedMemo.name"></span>"? This action can't be undone!</p>

            <div class="flex justify-between mt-4">
                <button class="border-2 border-gray-400 text-gray-600 rounded-xl w-32 h-12 hover:bg-gray-200" @click="showDeleteMemo = false">Cancel</button>
                <button class="border-2 bg-red-500 text-white font-bold rounded-xl w-32 h-12 hover:bg-red-600" @click="$wire.delete(selectedMemo.id); showDeleteMemo = false">Delete</button>
            </div>
        </div>
    </div>
</div>