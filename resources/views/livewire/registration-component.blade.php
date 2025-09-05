<div>

        <div class="lg:flex sm:grid overflow-hidden rounded-2xl shadow-2xl">
        <img src="../images/registration.png" class="lg:h-[40rem] h-32 w-96" alt="Register-Image">
        <form wire:submit="register" class="grid px-2">
            <p class="text-center text-3xl text-indigo-600 font-semibold mt-2 mb-4">Get Started!</p>
            <div class="grid">
                <label for="" class="font-medium">Username:</label>
                <input type="text" wire:model="name" class="border-2 border-gray-200 h-12 w-96 rounded-xl px-4 focus:outline-none focus:border-indigo-600">
                    @error('name')
                        <p class="pl-6 text-xs text-red-500 italic font-medium">{{ $message }}</p>                        
                    @enderror
            </div>

            <div class="grid">
                <label for="" class="font-medium">Email:</label>
                <input type="email" wire:model="email" class="border-2 border-gray-200 h-12 w-96 rounded-xl px-4 focus:outline-none focus:border-indigo-600">
                    @error('email')
                        <p class="pl-6 text-xs text-red-500 italic font-medium">{{ $message }}</p>                        
                    @enderror
            </div>

            <div class="grid">
                <label for="" class="font-medium">Phone:</label>
                <input type="tel" wire:model="phone" class="border-2 border-gray-200 h-12 w-96 rounded-xl px-4 focus:outline-none focus:border-indigo-600">
                    @error('phone')
                        <p class="pl-6 text-xs text-red-500 italic font-medium">{{ $message }}</p>                        
                    @enderror
            </div>
            
            <div class="lg:flex sm:grid gap-3">
                <div class="grid">
                    <label for="" class="font-medium">Password:</label>
                    <input type="password" wire:model="password" class="border-2 border-gray-200 h-12 w-64 rounded-xl px-4 focus:outline-none focus:border-indigo-600">
                    @error('password')
                        <p class="text-center text-xs text-red-500 italic font-medium">{{ $message }}</p>                        
                    @enderror
                </div>
                <div class="grid">
                    <label for="" class="font-medium">Confirm Password:</label>
                    <input type="password" wire:model="passwordConfirmation" class="border-2 border-gray-200 h-12 w-64 rounded-xl px-4 focus:outline-none focus:border-indigo-600">

                    @error('passwordConfirmation')
                        <p class="text-center text-xs text-red-500 italic font-medium">{{ $message }}</p>                        
                    @enderror
                </div>
            </div>

            <button type="submit" class="w-96 h-12 mx-auto bg-indigo-500 hover:bg-indigo-600 active:scale-95 text-white font-bold rounded-xl my-4 transition duration-300">Register</button>

            <a href="{{route('login')}}" class="text-blue-500 text-xs font-bold" wire:navigate>Already have an Account? Login</a>
        </form>
    </div>   

</div>
