<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
    @vite('resources/css/app.css')
</head>

<body class="flex gap-2" x-data="{ showRecents : false,
                                    showFavourites : false,
                                    showEvents : false,
                                    showMemos : false,
                                    editEvent : false,
                                    editMemo : false,
                                    showDeleteEvent : false,
                                    showDeleteMemo : false,
                                    showNotif: true,
                                    showNotifDel: true,
                                    memoDetails: false,
                                    eventDetails: false,
                                    showSun : false,
                                    showMoon : false,
                                    selectedEvent : {},
                                    selectedMemo : {},
                                    formatDate(date) {
                                        return new Date(date).toLocaleDateString('en-US', {
                                            day: '2-digit',
                                            month: 'short',
                                            year: 'numeric'
                                        });
                                    },
                                  }"
    x-init="showRecents = true, showEvents = true, showSun = true">


    <!-- Error Message -->
    @if (session('error'))
    <div class="fixed top-4 right-6 z-50 bg-red-100 border border-red-200 w-64 h-fit p-4 rounded-xl"
        x-init="setTimeout(()=>showNotifDel = false, 3000)"
        x-show="showNotifDel"
        x-transition.duration.700ms>
        <p class="text-center text-red-700 font-bold">{{ session('error')}}</p>
    </div>
    @endif

    <!-- Success Message -->
    @if (session('success'))
    <div class="fixed top-4 right-6 z-50 bg-blue-100 border border-blue-200 w-64 h-fit p-4 rounded-xl"
        x-init="setTimeout(()=>showNotif = false, 3000)"
        x-show="showNotif"
        x-transition.duration.700ms>
        <p class="text-center text-blue-700 font-bold">{{ session('success')}}</p>
    </div>
    @endif


    <aside class="fixed top-0 left-0 flex-col justify-between w-[20rem] hidden sm:block h-[100vh]  bg-gray-50">
        <nav>
            <p class="px-2 pt-4 font-bold text-blue-600 text-2xl mb-6">To-Do App</p>
            <ul class="px-6 space-y-4 text-blue-500 font-medium">
                <li class="px-4 py-2 rounded-xl {{request()->routeIs('home') ? 'bg-blue-300 text-blue-700' : 'hover:bg-blue-100'}}">
                    <a href="{{route('home')}}" class="flex gap-2 items-center" wire:navigate>
                        <x-heroicon-o-home class="w-8 h-8" />
                        Home
                    </a>
                </li>

                <li class="px-4 py-2 rounded-xl {{request()->routeIs('tasks') ? 'bg-blue-300 text-blue-700' : 'hover:bg-blue-100'}}">
                    <a href="{{route('tasks')}}" class="flex gap-2 items-center" wire:navigate>
                        <x-heroicon-o-briefcase class="w-8 h-8" />
                        Tasks
                    </a>
                </li>

                <li class="px-4 py-2 rounded-xl {{request()->routeIs('support') ? 'bg-blue-300 text-blue-700' : 'hover:bg-blue-100'}}">
                    <a href="" class="flex gap-2 items-center" wire:navigate>
                        <x-heroicon-o-wrench-screwdriver class="w-8 h-8" />
                        Support
                    </a>
                </li>

                <li class="px-4 py-2 rounded-xl {{request()->routeIs('settings') ? 'bg-blue-300 text-blue-700' : 'hover:bg-blue-100'}}">
                    <a href="{{ route('settings') }}" class="flex gap-2 items-center" wire:navigate>
                        <x-heroicon-o-cog class="w-8 h-8" />
                        Settings
                    </a>
                </li>
            </ul>
        </nav>

        <div class="bg-white relative top-[50vh] w-full mx-2 p-2 rounded-2xl">
            <p class="font-medium text-center">{{ Auth()->User()->name ??'Samwel'}}</p>
            <p class="font-light text-gray-500 text-center">{{ Auth()->User()->email ??'samwel@gmail.com'}}</p>
            
@livewire('Logout')
        </div>
    </aside>

    <!-- MOBILE NAVBAR -->
    <nav class="block md:hidden fixed bottom-0 w-full h-fit py-2 px-4 bg-white z-30">
        <ul class="text-xs flex justify-between text-blue-400 font-medium">
            <li>
                <a href="{{route('home')}}" class="grid gap-2 items-center{{ request()->routeIs('home') ? 'fill-blue-400 text-blue-500' : 'text-blue-400'}}">
                    @if (request()->routeIs('home'))
                    <x-heroicon-s-home class="w-6 h-6" />
                    @else
                    <x-heroicon-o-home class="w-6 h-6" />
                    @endif
                    Home
                </a>
            </li>

            <li>
                <a href="{{route('tasks')}}" class="grid gap-2 items-center">
                    @if (request()->routeIs('tasks'))
                    <x-heroicon-s-briefcase class="w-6 h-6" />
                    @else
                    <x-heroicon-o-briefcase class="w-6 h-6" />
                    @endif
                    Tasks
                </a>
            </li>

            <li>
                <a href="{{route('support')}}" class="grid gap-2 items-center">
                    @if (request()->routeIs('support'))
                    <x-heroicon-s-wrench-screwdriver class="w-6 h-6" />
                    @else
                    <x-heroicon-o-wrench-screwdriver class="w-6 h-6" />
                    @endif
                    Support
                </a>
            </li>

            <li>
                <a href="{{ route('settings') }}" class="grid gap-2 items-center">
                    @if (request()->routeIs('settings'))
                    <x-heroicon-s-cog class="w-6 h-6" />
                    @else
                    <x-heroicon-o-cog class="w-6 h-6" />
                    @endif
                    Settings
                </a>
            </li>
        </ul>
    </nav>

    <main class="bg-gray-50 px-4 py-6 w-full overflow-scroll lg:ml-[21rem]">
        {{ $slot }}
    </main>
</body>

</html>