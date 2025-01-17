<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<livewire:styles/>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Paperclip</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" >

    <!-- Styles -->
    @vite('resources/css/app.css')

</head>
<livewire:scripts />
<body>
    <div class="border-b h-20 flex px-8">
        <x-bx-paperclip class="size-10 self-center rotate-[135deg]"/>
        <p class="text-5xl self-center">Paperclip</p>
        <div class="flex ml-auto space-x-2">
            <x-ui.create-post-button size="9"/>
            <div class="space-y-1.5 items-center self-center">
                <a class="flex hover:underline" href="{{route('profile.show', ['username'=>Auth::user()->username])}}"> <p>@</p> {{Auth::user()->username}} </a>
                <form method="post" action="/logout">
                    @csrf
                    <button type="submit" class="border rounded-xl py-1 px-3  hover:underline">Log out</button>
                </form>
            </div>
        </div>

    </div>
    {{$slot}}
</body>
