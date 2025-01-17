<x-layouts.top-bar>
    <div class="py-4 px-40 ">
        <div class="flex">
            <div class="border min-w-[30%] max-w-[30%] h-fit p-4 space-y-4 mr-4">
                <div class="flex text-3xl">
                    <p>@</p> {{$user->username}}
                    @if(Auth::user()->id == $user->id)
                        (you)
                    @endif
                </div>
                <div class="text-l">{{$user->bio}}</div>
                <hr>
                <div class="flex text-sm">
                    <p class="mr-2"> {{$user->posts->count()}} posts </p>
                    <p class="mr-2"> {{$user->comments->count()}} comments </p>
                    <p class="ml-auto"> Created {{$user->created_at->diffForHumans()}}</p>
                </div>
                <hr>
                <div class="flex">
                    <p class="mr-2">Mutuals:</p>
                    <ul class="mr-2">
                        @foreach($user->mutuals(Auth::user()) as $mutual)
                            <li>
                                <a class="flex hover:underline" href="/profile/{{$mutual->username}}">
                                    <p>@</p>
                                    {{$mutual->username}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <p class="ml-auto">{{$user->friends()->count()}} friends</p>
                </div>
            </div>
            <livewire:timeline :user="$user"></livewire:timeline>
        </div>

    </div>
</x-layouts.top-bar>
