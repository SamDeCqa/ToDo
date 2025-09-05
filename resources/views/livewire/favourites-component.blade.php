<div>

    <div class="grid lg:grid-cols-2 space-y-4  lg:px-6 w-full justify-center">

        <!-- CARD1 -->
        @forelse ($memos as $memo)
        <div class="bg-gray-100 px-2 lg:px-4 py-3 lg:py-5 lg:w-[40rem] lg:h-fit rounded-xl hover:shadow-md transition duration-500">
            <div class="flex justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Created {{ $memo->created_at->diffForHumans()}}</p>
                    <p class="text-gray-700 font-semibold"></p>
                </div>
            </div>

            <div class="flex justify-between items-center p-2 md:p-4 bg-[#FDFDFD] rounded-xl mt-4">
                <div class="flex justify-between w-full">
                    <div class="flex-col text-xs text-gray-500 font-medium">
                        <p class="text-xl font-semibold">{{ $memo->title }}</p>
                        <!-- <p class="flex mt-4 gap-1 items-center"><x-heroicon-o-map-pin class="w-6 h-6 text-blue-500" />{{$memo->location}}</p> -->
                    </div>

                    
                </div>

            </div>

            <div class="bg-[#FDFDFD] items-center grid justify-between my-2 p-2 lg:p-4 rounded-lg text-sm">
                <p class="text-sm font-medium">Description:</p>
                <p class="w-full truncate text-sm font-thin">{{$memo->info}}</p>
            </div>

            <div class="bg-[#FDFDFD] items-center flex justify-between p-2 lg:p-4 rounded-lg text-sm">
                <p class="text-gray-500 font-medium flex gap-2"><x-heroicon-s-star class="w-5 h-5 text-amber-500" wire:click="removeFavourite({{$memo->id}})" />Remove from favourites</p>
                <p class="text-blue-600 font-semibold flex gap-2 cursor-pointer"><x-heroicon-o-share class="w-5 h-5 text-blue-500" />Share Task</p>
            </div>
        </div>
        @empty
        <div>
            <div class="p-4 bg-blue-200 rounded-xl text-blue-600">
                <p class="text-3xl text-center text-blue-600 font-medium">Empty</p>
                <x-heroicon-o-information-circle class="w-12 h-12 mx-auto my-4" />
                <p class="text-xl text-center">No Memos you made Favourites</p>

            </div>
        </div>
        @endforelse

        



    </div>

</div>