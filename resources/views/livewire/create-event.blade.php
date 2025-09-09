<div>
    <p class="text-3xl font-bold text-gray-800">Create an Event</p>
    <div class="mt-12 p-4">
        <form wire:submit="save" class="space-y-6">
            <div class="flex justify-between">
                <button type="submit" class="w-32 text-white font-medium rounded-lg hover:bg-blue-500 bg-blue-400 transition duration-300">Save</button>
                <button class="w-32 border-2 border-gray-400 hover:text-red-500 hover:border-red-400 rounded py-2 transition duration-300">Cancel</button>
            </div>
            
            <div class="grid">
                <label for="name" class="font-medium text-lg text-indigo-700">Event name:</label>
                <input wire:model="name" class="border-2 w-96 border-gray-400 focus:outline-none focus:border-blue-400 h-12 rounded-xl px-4" type="text">
                @error('name')
                    <p class="text-xs text-red-500 font-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid">
                <label for="location" class="font-medium text-lg text-indigo-700">Location:</label>
                <input wire:model="location" class="border-2 w-96 border-gray-400 focus:outline-none focus:border-blue-400 h-12 rounded-xl px-4" type="text">
                @error('location')
                    <p class="text-xs text-red-500 font-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <div class="grid">
                    <label for="starts" class="font-medium text-lg text-indigo-700">Starts from:</label>
                    <input wire:model="starts" class="border-2 w-64 border-gray-400 focus:outline-none focus:border-blue-400 h-12 rounded-xl px-4" type="datetime-local">
                    @error('starts')
                        <p class="text-xs text-red-500 font-light">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="grid">
                    <label for="ends" class="font-medium text-lg text-indigo-700">Ends on:</label>
                    <input wire:model="ends" class="border-2 w-64 border-gray-400 focus:outline-none focus:border-blue-400 h-12 rounded-xl px-4" type="datetime-local">
                    @error('ends')
                        <p class="text-xs text-red-500 font-light">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid">
                <label for="description" class="font-medium text-lg text-indigo-700">Event's description:</label>
                <div class="flex gap-2">
                    <textarea wire:model="description" cols="5" rows="10" class="border-2 w-96 border-gray-400 focus:outline-none focus:border-blue-400 rounded-xl px-4"></textarea>
                    @error('description')
                        <p class="text-xs text-red-500 font-light">{{ $message }}</p>
                    @enderror
                </div>
            </div>

        </form>
    </div>
</div>
