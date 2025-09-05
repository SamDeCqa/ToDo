<div>

    <div class="grid lg:flex lg:w-fit h-fit w-96 lg:rounded-2xl lg:shadow-2xl overflow-hidden">
        <img src="../images/login.png" alt="Login-Image" class="w-full h-64 lg:w-96 lg:h-96">
        <form wire:submit="login" class="grid my-4 mr-4 space-y-3 items-center px-4 lg:p-0">

        @if (session('error'))
            <div class="bg-red-200 py-1 rounded-md">
                <p class="text-center text-red-500 font-medium">{{session('error')}}</p>
            </div>            
        @endif

            <p class="text-2xl font-bold text-gray-800">Welcome Back!</p>
            <input type="text" wire:model="usernameOrEmail" class="border-2 border-gray-200 rounded-2xl w-full lg:w-96 h-12 px-4 focus:outline-none focus:border-indigo-500" placeholder="Username or Email">
            <input type="password" wire:model="password" class="border-2 border-gray-200 rounded-2xl w-full lg:w-96 h-12 px-4 focus:outline-none focus:border-indigo-500" placeholder="Password">
            <div class="w-full flex justify-end mb-4">
                <a href="#" class="text-xs text-blue-500 font-bold">Forgot Password</a>
            </div>
            <div class="flex gap-3 pl-4">
                <input type="checkbox" wire:model="remember">
                <label for="" class="text-gray-800">Remember me</label>
            </div>
            <button type="submit" class="bg-indigo-600 h-[3.5rem] w-3/4 mx-auto text-white rounded-xl font-medium hover:bg-indigo-700 transition duration-300 active:scale-95 cursor-pointer">Login</button>

            <a href="{{route('register')}}" class="text-xs text-blue-500 font-bold pl-4" wire:navigate>Don't have an Account? Register</a>
        </form>
    </div>

</div>
