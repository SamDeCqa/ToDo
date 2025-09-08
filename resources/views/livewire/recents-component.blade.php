<div>

    <div class="grid lg:grid-cols-2 space-y-4  lg:px-6 w-full justify-center">

        <!-- CARD1 -->
        @forelse ($events as $event)
        <div class="bg-gray-100 px-2 lg:px-4 py-3 lg:py-5 lg:w-[40rem] lg:h-fit rounded-xl hover:shadow-md transition duration-500">
            <div class="flex justify-between">
                <div class="flex justify-between w-full">
                    <p class="text-gray-400 text-sm ">Created {{ $event->created_at->diffForHumans()}}</p>
                    @if($event->from > now())
                    <p class="flex gap-1 text-amber-600 text-xs  items-center bg-amber-100 rounded-lg px-2 py-1 font-medium">
                            <x-heroicon-o-bell-alert class="w-4 h-4"/>
                            <span>Upcoming</span>
                        </p>
                @elseif($event->due < now())
                    <p class="flex gap-1 text-green-600 text-xs  items-center bg-green-200 rounded-lg px-2 py-1 font-medium">
                            <x-heroicon-o-check-badge class="w-4 h-4"/>
                            <span>Completed</span>
                        </p>
                @else
                        <p class="flex gap-1 text-indigo-600 text-xs  items-center bg-indigo-200 rounded-lg px-2 py-1 font-medium">
                            <x-heroicon-o-arrow-path class="w-4 h-4"/>
                            <span>On Going</span>
                        </p>
                @endif
                </div>
            </div>

            <div class="flex justify-between items-center p-2 md:p-4 bg-[#FDFDFD] rounded-xl mt-4">
                <div class="flex justify-between w-full">
                    <div class="flex-col text-xs text-gray-500 font-medium">
                        <p class="text-xl font-semibold">{{ $event->name }}</p>
                        <p class="flex mt-4 gap-1 items-center"><x-heroicon-o-map-pin class="w-6 h-6 text-blue-500" />{{$event->location}}</p>
                    </div>

                    <div class="grid">
                        <p class="font-medium text-sm">From: <span class="font-thin">{{$event->from->format('d M, Y') ?? 'Not Specified'}}</span></p>
                        <p class="font-medium text-sm">Due: <span class="font-thin">{{$event->due->format('d M, Y') ?? 'Not Specified'}}</span></p>
                    </div>
                </div>

            </div>

            <div class="bg-[#FDFDFD] items-center grid justify-between my-2 p-2 lg:p-4 rounded-lg text-sm">
                <p class="text-sm font-medium">Description:</p>
                <p class="w-full truncate text-sm font-thin">{{$event->description}}</p>
            </div>

            <div class="bg-[#FDFDFD] items-center flex justify-between p-2 lg:p-4 rounded-lg text-sm">
                @if ($event->is_favourite === 1)
                    <div class="flex gap-1 items-center" wire:click="toggleFavourite({{$event->id}})">
                            <x-heroicon-s-star class="w-5 h-5 text-amber-500"/><p class="text-gray-500 text-xs font-medium flex gap-2">Remove from favourites</p>
                    </div>
                @else
                     <div class="flex gap-1 items-center" wire:click="toggleFavourite({{$event->id}})">
                         <x-heroicon-o-star class="w-5 h-5 text-gray-600"/><p class="text-gray-500 text-xs font-medium flex gap-2">Add to favourites</p>

                     </div>
                @endif
                
                <p class="text-blue-600 font-semibold flex gap-2 cursor-pointer"><x-heroicon-o-share class="w-5 h-5 text-blue-500" />Share Task</p>
            </div>
        </div>
        @empty
        <div>
            <div class="p-4 bg-blue-200 rounded-xl text-blue-600">
                <p class="text-3xl text-center text-blue-600 font-medium">Empty</p>
                <x-heroicon-o-information-circle class="w-12 h-12 mx-auto my-4" />
                <p class="text-xl text-center">No recent Events or Memos you created</p>

            </div>
        </div>
        @endforelse

        



    </div>

</div>