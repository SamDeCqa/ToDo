<div>
            <p class="text-gray-800 text-xl font-semibold mt-4">Overview</p>
        <div class="lg:flex grid  mt-6 gap-2 lg:gap-6 justify-center">
            <div class="w-full lg:w-96 h-fit flex justify-between shadow bg-white rounded-2xl font-medium hover:bg-blue-500 transition duration-700 hover:text-white p-8">
                <div>
                    <p class="text-5xl font-bold">{{ $memos }}</p>
                    <p class="justify-end mt-8">Memos</p>
                </div>
                <x-heroicon-o-rectangle-stack class="w-12 h-12 p-3 rounded-lg bg-rose-300"/> 
            </div>
            <div class="w-96 h-fit flex justify-between shadow bg-white rounded-2xl font-medium hover:bg-blue-500 transition duration-700 hover:text-white p-8">
                <div>
                    <p class="text-5xl font-bold">{{ $completedTasks }}</p>
                    <p class="justify-end mt-8">Completed Tasks</p>
                </div>
                <x-heroicon-o-check-badge class="w-12 h-12 p-3 rounded-lg text-green-600 bg-green-100 "/> 
            </div>
            <div class="w-96 h-fit flex justify-between shadow bg-white rounded-2xl font-medium hover:bg-blue-500 transition duration-700 hover:text-white p-8">
                <div>
                    <p class="text-5xl font-bold">{{ $allEvents }}</p>
                    <p class="justify-end mt-8">Events</p>
                </div>
                <x-heroicon-o-megaphone class="w-12 h-12 p-3 rounded-lg bg-rose-300"/> 
            </div>
            <div class="w-96 h-fit flex justify-between shadow bg-white rounded-2xl font-medium hover:bg-blue-500 transition duration-700 hover:text-white p-8">
                <div>
                    <p class="text-5xl font-bold">{{ $futureEvents }}</p>
                    <p class="justify-end mt-8">Events to Come</p>
                </div>
                <x-heroicon-o-arrow-trending-up class="w-12 h-12 p-3 rounded-lg text-amber-600 bg-amber-100"/> 
            </div>
        </div>
</div>
