<a class="flex space-x-1" href="{{route('create-post')}}">
    @php($sizeClass = "size-$size")
    <x-bx-edit class="{{$sizeClass}} hover:scale-105 active:scale-100  self-center"/>
</a>
