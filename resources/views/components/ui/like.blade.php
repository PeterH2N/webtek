<button class="flex space-x-1">
    @php($sizeClass = "size-$size")
    @if($post->userLikes(Auth::user()))
        <x-bxs-like class="{{$sizeClass}} hover:scale-105 active:scale-100  self-center"/>
    @else
        <x-bx-like class="{{$sizeClass}} hover:scale-105 active:scale-100  self-center"/>
    @endif
</button>
