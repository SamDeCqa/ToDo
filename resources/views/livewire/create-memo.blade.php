<div class="pb-24">
        <p class="text-3xl font-bold text-gray-800">Create a Memo</p>
    <div class="mt-12">
        <form wire:submit="save" class="space-y-6">
            <div class="flex justify-between">
                <button type="submit" class="w-32 text-white font-medium rounded-lg hover:bg-blue-500 bg-blue-400 transition duration-300">Save</button>
                <button type="button" wire:click="back" class="w-32 border-2 border-gray-400 hover:text-red-500 hover:border-red-400 rounded py-2 transition duration-300">Cancel</button>
            </div>
            <div class="grid">
                <label for="title" class="font-semibold text-lg text-indigo-600">title</label>
                <input wire:model="title" class="border-2 w-full lg:w-96 border-gray-400 focus:outline-none focus:border-blue-400 h-12 rounded-xl px-4" type="text">
                @error('title')
                    <p class="text-xs text-red-500 font-light">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid">
                <label for="info" class="font-semibold text-lg text-indigo-600">info</label>
                <div class="flex gap-2 items-center">
                    <textarea wire:model="info" rows="10" class="border w-full lg:w-3/4 border-gray-400 focus:outline-none focus:border-2 focus:border-blue-400 rounded-xl px-4 py-2"></textarea>
                    @error('info')
                        <p class="text-xs text-red-500 font-bold">{{ $message }}</p>
                    @enderror
                </div>
            </div>



        </form>
    </div>
</div>
