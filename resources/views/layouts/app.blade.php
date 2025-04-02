<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cursor Rules Generator</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">Cursor Rules Generator</h1>
            </div>
        </header>

        <main class="flex-grow">
            {{ $slot }}
        </main>

        <footer class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center text-gray-600">
                Created by 
                <a href="https://laraveldaily.com" class="text-blue-600 hover:text-blue-800" target="_blank">Laravel Daily</a> 
                and 
                <a href="https://cursor.com" class="text-blue-600 hover:text-blue-800" target="_blank">Cursor</a>
            </div>
        </footer>
    </div>
</body>
</html> 