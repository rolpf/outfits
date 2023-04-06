<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased flex items-center justify-center h-screen">
        @php
            $categories = \App\Models\Category::all();
        @endphp
        <div class="w-48">
            <x-select2 :items="$categories" fieldName="test" />
        </div>

    </body>
</html>
