<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Booking Billiard' }}</title>
        @vite('resources/css/app.css')
    </head>

    <body class="bg-gray-100 font-sans leading-normal tracking-normal">

        <header class="bg-blue-600 text-white p-4">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-xl font-bold">Booking Meja Billiard</h1>
                <div>
                    <a href="/" class="hover:underline">Home</a>
                </div>
            </div>
        </header>

        <main class="container mx-auto py-8">
            @yield('content')
        </main>

        <footer class="text-center p-4 mt-8 text-gray-600 text-sm">
            &copy; {{ date('Y') }} Booking Meja Billiard
        </footer>

    </body>

</html>