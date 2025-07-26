<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="py-10 px-20">
        <x-navbar></x-navbar>
        <main>
            {{ $slot }}
        </main>
        <x-footer></x-footer>
    </div>
</body>
@vite(['resources/css/app.css', 'resources/js/app.js'])
@vite('node_modules/flowbite/dist/flowbite.min.js')
</html>