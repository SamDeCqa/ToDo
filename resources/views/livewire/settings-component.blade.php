<div class="h-screen">
    <p class="text-2xl font-serif text-center font-bold">Settings</p>
    <hr class="w-screen text-gray-400 my-6">

    <div class="mb-6">
        <p class="text-gray-500 mb-2 font-medium">ACCOUNT</p>
        <div class="bg-[#FDFDFD] rounded-xl p-2">
            <ul>
                <li class="mb-4  hover:bg-blue-50 hover:text-blue-500 text-gray-700 px-2 py-1 rounded-xl">
                    <a href="{{ route('profile') }}" class="flex gap-2 items-center w-full">
                        <x-heroicon-s-user class="h-5 w-5 text-blue-500"/>
                        <p>My Profile</p>
                    </a>
                </li>
                <li class="mb-4 hover:bg-blue-50 hover:text-blue-500 text-gray-700 px-2 py-1 rounded-xl">
                    <a href="" class="flex gap-2 items-center w-full ">
                        <x-heroicon-s-check-badge class="h-5 w-5 text-blue-500"/>
                        <p>Account Verification</p>
                    </a>
                </li>
                <li class="mb-4  hover:bg-blue-50 hover:text-blue-500 text-gray-700 px-2 py-1 rounded-xl">
                    <a href="" class="flex gap-2 items-center w-full">
                        <x-heroicon-s-bell-alert class="h-5 w-5 text-blue-500"/>
                        <p>Notifications</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div>
        <p class="text-gray-500 font-medium">PREFERENCES</p>
        <div class="bg-[#FDFDFD] rounded-xl p-4">
            <ul>
                <li class="mb-4 hover:bg-blue-50 hover:text-blue-500 text-gray-700 px-2 py-1 rounded-xl flex justify-between">
                    <div class="flex gap-2 items-center-safe">
                        <x-heroicon-s-paint-brush class="w-5 h-5 text-blue-500"/>
                        <p>Theme</p>
                    </div>

                    <div class="bg-gray-500 p-1 rounded-full flex gap-2 h-fit w-12">
                        <div class="p-2 rounded-full bg-[#FDFDFD]" x-show="showSun" @click="showSun = false; showMoon = true" x-cloak x-transition>
                            <x-heroicon-o-sun class="w-3 h-3"/>
                        </div>
                        <div class="p-2 rounded-full bg-[#FDFDFD]" x-show="showMoon" @click="showSun = true; showMoon = false" x-cloak x-transition>
                            <x-heroicon-o-moon class="w-3 h-3"/>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    @livewire('logout')
</div>
