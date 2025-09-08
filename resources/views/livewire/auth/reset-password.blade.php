<div>
    <div class="shadow-2xl grid lg:flex rounded-2xl p-6">
        <img src="{{ asset('images/reset-password.png') }}" class="w-96" alt="reset-password">
        <form wire:submit="resetPassword" class="space-y-4 flex flex-col my-4 ml-4 w-full mx-auto justify-center items-center">
            <p class="text-3xl text-center font-bold">Reset Password</p>
            <p class="text-lg font-thin">Hey <span class="font-medium text-gray-700">{{ $username }}</span> please enter your new password and confirm it below</p>
            @error('token')
                <div class="bg-red-100 p-4">
                    <p class="text-xs text-center text-red-600 font-medium w-96">{{ $message }}</p>
                </div>                
            @enderror
            <input type="hidden" wire:model="token" class="border-2 border-gray-400 h-12 w-96 focus:outline-none focus:border-blue-600 rounded-2xl px-4" value="{{ $token }}">

            <div class="flex flex-col">
                <input type="password" wire:model="password" class="border-2 border-gray-400 h-12 w-96 focus:outline-none focus:border-blue-600 rounded-2xl px-4" placeholder="New Password">
                @error('password')
                        <p class="text-xs text-center text-red-600 font-medium w-96">Password should atleast be of six characters with atleast a single letter, number and a symbol</p>
                @enderror
            </div>
            
            <div class="flex flex-col">
                <input type="password" wire:model="passwordConfirmation" class="border-2 border-gray-400 h-12 w-96 focus:outline-none focus:border-blue-600 rounded-2xl px-4" placeholder="Confirm New Password">
                @error('passwordConfirmation')
                    <p class="text-xs text-center text-red-600 font-medium w-96">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="py-4 bg-blue-500 w-64 rounded-lg text-white font-semibold hover:bg-blue-700 transition duration-300">Set Password</button>
        </form>
    </div>
</div>
