<button class="flex space-x-1">
    @php($sizeClass = "size-$size")
    @if($post->userDislikes(Auth::user()))
        <x-bxs-dislike class="{{$sizeClass}} hover:scale-105 active:scale-100  self-center"/>
    @else
        <x-bx-dislike class="{{$sizeClass}} hover:scale-105 active:scale-100  self-center"/>
    @endif
</button>
