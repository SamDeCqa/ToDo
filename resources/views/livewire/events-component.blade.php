<div>
    <div class="flex mt-6 gap-8 md:justify-center">
                <input type="text" placeholder="Search Events..." wire:model.live.debounce.300ms="searchTerm"
                        class="bg-gray-200 border lg:w-96 border-gray-300 px-4 rounded-full h-12  md:h-14 focus:outline-none focus:border-2 focus:border-blue-500">
                <x-heroicon-o-magnifying-glass class="w-12 h-12 p-2 bg-gray-100 rounded-full"/>
    </div>

    <div class="flex justify-between mt-4">
        <p class="text-3xl font-bold">Events</p>
        <div class="flex gap-4">
            <a href="{{ route('create-event') }}" class="bg-blue-600 hover:bg-blue-700 w-32 py-4 text-center rounded-lg text-white font-semibold transition duration-300">New Event</a>
        </div>
    </div>
    <div class="my-4">
        {{ $events->links()}}
    </div>
    <div class="grid lg:grid-cols-7 gap-4">

        @forelse ($events as $event)
        <div class="bg-gray-100 col-span-3 px-2 lg:px-4 py-3 lg:py-5 lg:w-[40rem] h-fit rounded-xl hover:shadow-md transition duration-500">
            <div class="flex justify-between">
                <div class="flex gap-4">
                    <p class="text-gray-400 text-sm">Created {{$event->created_at->diffForHumans()}}</p>
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
                <p class="text-blue-600 text-sm font-semibold cursor-pointer"
                     @click="selectedEvent=@js($event);eventDetails = true">See details</p>
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


            <div class="flex justify-between text-xs mt-2">
                <button
                    class="hover:bg-amber-50 p-2 rounded-full transition duration-300"
                    wire:click="toggleFavourite({{$event->id}})">

                    @if ($event->is_favourite === 1)
                    <x-heroicon-s-star class="w-5 h-5 text-amber-500" />
                    @else
                    <x-heroicon-o-star class="w-5 h-5 text-gray-600" />
                    @endif
                </button>

                <div>
                    <button class="hover:bg-blue-100 p-2 rounded-full text-blue-400 hover:text-blue-500 transition duration-300"
                            @click="selectedEvent=@js($event);editEvent = true">
                        <x-heroicon-o-pencil class="w-5 h-5" />
                    </button>
                    <button class="hover:bg-red-100 p-2 rounded-full text-red-400 hover:text-red-500 transition duration-300"
                        @click="selectedEvent={ id: '{{$event->id}}', name: '{{$event->name}}' };showDeleteEvent = true">
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
                    <p class="text-xl mt-4">No Events Yet</p>
                </div>
            </div>
        @endforelse


    </div>
    <div class="w-3/4 mt-4">
        {{ $events->links()}}
    </div>

    <!-- DELETE MODAL -->
    <div class="fixed backdrop-blur-xs inset-0 z-40 w-full flex h-full justify-center bg-opacity-75" x-show="showDeleteEvent" x-cloak x-transition.duration.300ms>
        <div class="relative p-4 rounded-2xl bg-[#FDFDFD] w-64 lg:w-96 h-fit mt-4 z-50" @click.outside="showDeleteEvent = false">
            <p class="font-medium">Delete</p>
            <hr class="my-2">
            <x-heroicon-o-exclamation-triangle class="w-24 h-24 text-red-600 rounded-full bg-red-100 items-center p-6 mx-auto" />

            <p class="text-sm mt-4">Do you really want to delete "<span class="italic font-bold" x-text="selectedEvent.name"></span>"? This action can't be undone!</p>

            <div class="flex justify-between mt-4">
                <button class="border-2 border-gray-400 text-gray-600 rounded-xl w-32 h-12 hover:bg-gray-200" @click="showDeleteEvent = false">Cancel</button>
                <button class="border-2 bg-red-500 text-white font-bold rounded-xl w-32 h-12 hover:bg-red-600" @click="$wire.delete(selectedEvent.id); showDeleteEvent = false">Delete</button>
            </div>
        </div>
    </div>

    <!-- Details Modal -->
     <div class="fixed inset-0 backdrop-blur-xs opacity-100 z-40 w-full h-full flex justify-center items-center" x-show="eventDetails" x-cloak x-transition.duration.500ms>
        
        <div class="relative z-50 bg-white p-4 w-96 space-y-6" x-show="eventDetails" @click.outside="eventDetails = false">
            <div class="flex justify-end">
                <x-heroicon-s-x-mark class="w-8 h-8 text-gray-600 cursor-pointer" @click="eventDetails = false" />
            </div>
            <p class="text-3xl font-bold text-blue-600"><span x-text="selectedEvent.name"></span></p>
            <p class="font-semibold text-blue-500">From: <span class="font-thin text-gray-800"" x-text="formatDate(selectedEvent.from)"></span></p>
            <p class="font-semibold text-blue-500">To: <span class="font-thin text-gray-800" x-text="formatDate(selectedEvent.due)"></span></p>
            <p class="font-semibold text-blue-500">Venue: <span class="font-thin text-gray-800"" x-text="selectedEvent.location"></span></p>
            <div class="flex-col gap-2">
                <p class="font-semibold text-blue-500">Description:</p>
                <span class="font-thin text-gray-800" x-text="selectedEvent.description"></span>
            </div>
        </div>
     </div>

     <!-- Edit Event -->
     <div class="fixed inset-0 backdrop-blur-xs opacity-100 z-40 w-full h-full flex justify-center items-center" x-show="editEvent" x-cloak x-transition.duration.500ms>
        
        <div class="relative flex flex-col z-50 bg-white p-4 w-fit" x-show="editEvent" @click.outside="editEvent = false">
            <div class="flex justify-end">
                <x-heroicon-s-x-mark class="w-8 h-8 text-gray-600 cursor-pointer" @click="editEvent = false" />
            </div>

            <form wire:submit.prevent="edit" class="space-y-6">
                <p class="text-xl font-semibold text-blue-600">Edit Event</p>
                <div class="grid">
                    <label for="">Event's Name</label>
                    <input wire:model="name" type="text" x-model="selectedEvent.name" class="px-4 h-12 rounded-xl border-2 border-gray-400 focus:outline-none focus:border-blue-500">
                </div>
    
                <div class="grid">
                    <label for="">Location</label>
                    <input wire:model="location" type="text" x-model="selectedEvent.location" class="px-4 h-12 rounded-xl border-2 border-gray-400 focus:outline-none focus:border-blue-500">
                </div>
    
                <div class="flex gap-4">
                    <div class="grid">
                        <label for="">From:</label>
                        <input wire:model="from" type="datetime-local" x-model="selectedEvent.from" class="px-4 h-12 rounded-xl border-2 border-gray-400 focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="grid">
                        <label for="">Ends:</label>
                        <input wire:model="due" type="datetime-local" x-model="selectedEvent.due" class="px-4 h-12 rounded-xl border-2 border-gray-400 focus:outline-none focus:border-blue-500">
                    </div>
                </div>
    
                <div class="grid">
                    <label for="">Description</label>
                    <textarea wire:model="description" type="text" rows="5" x-model="selectedEvent.description" class="px-4 rounded-xl border-2 border-gray-400 focus:outline-none focus:border-blue-500"></textarea>
                </div>
    
                <div class="flex justify-between">
                    <button class="flex gap-1 items-center border-2 border-red-500 rounded-xl w-32 justify-center text-red-500 hover:bg-red-500 hover:text-white transition duration-300 font-medium" @click="editEvent = false">
                        <x-heroicon-o-x-circle class="w-5 h-5"/>
                        Cancel
                    </button>
                    
                    <button type="submit" class="flex gap-1 items-center bg-blue-500 text-white font-medium w-32 py-1 justify-center rounded-xl active:scale-95 transition duration-300" @click="editEvent = false">
                        <x-heroicon-o-check class="w-5 h-5"/>
                        Save
                    </button>
                </div>

            </form>
        </div>
     </div>
</div>