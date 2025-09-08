<div class="w-screen h-screen flex justify-center items-center">
    <div class="rounded-2xl grid lg:flex shadow-2xl p-4 lg:h-[22rem]">
        <img src="{{asset('images/forgot-password.png')}}" class="h-full w-full lg:w-96" alt="forgot-password">
        <div class="w-[30rem] pl-12 lg:pl-0">
            <p class="text-center text-3xl text-blue-600 font-bold mb-4">Forgot Password</p>
            <p class="text-gray-500 font-light px-4">Don't worry! All you have to do is enter your Email and we will send a Password Reset Link to you</p>
    
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="bg-red-100 w-64 mx-auto my-2 p-4 rounded-2xl">
                        <p class="text-red-500 text-sm text-center font-medium">{{ $error }}</p>
                    </div>           
                @endforeach
            @endif
    
            <form wire:submit="sendLink" class="space-y-8 flex flex-col my-4 w-full mx-auto justify-center">
                <input type="email" wire:model="email"
                         class="w-3/4 mx-auto h-[52px] border-2 border-gray-400 rounded-2xl px-4 focus:outline-none focus:border-blue-500 text-gray-700" placeholder="Your Email Address...">
                <button type="submit" class="bg-gradient-to-tr from-blue-500 via-blue-400 to-blue-300 text-white font-medium w-96 mx-auto h-12 rounded-2xl hover:bg-blue-600 transition-all duration-300">
                    Send Password-Reset Link
                </button>
            </form>
    
            <a href="{{ route('login')}}" class="flex gap-0 m-8 items-center underline text-sm text-blue-600 font-medium">
                <x-heroicon-o-arrow-left class="w-4 h-4"/>
                Back to Login
            </a>
        </div>
    </div>
</div>
