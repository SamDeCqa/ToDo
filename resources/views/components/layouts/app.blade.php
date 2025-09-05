<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>
        @vite('resources/css/app.css')
    </head>
    <body class="h-screen w-screen flex justify-center items-center" x-data="{showNotif: true}">
        <div>
            @if (session('success'))             
                        <div class="fixed top-4 right-6 z-50 bg-blue-100 border border-blue-200 w-64 h-fit p-4 rounded-xl"
                        x-init="setTimeout(()=>showNotif = false, 3000)"
                        x-show="showNotif"
                        x-transition.duration.700ms>
                            <p class="text-center text-blue-700 font-bold">{{ session('success')}}</p>
                        </div>
            @endif
        </div>
        {{ $slot }}
    </body>
</html>
