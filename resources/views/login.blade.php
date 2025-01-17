<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<livewire:styles/>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" >

    <!-- Styles -->
    @vite('resources/css/app.css')

</head>
<livewire:scripts/>
<body>
<div class="flex h-screen justify-center items-center">
    <div class="w-[40%]">
        <livewire:login/>
    </div>



</div>
</body>
