{{-- Timeline --}}
<div class="space-y-4">
    {{-- filter --}}
    <div class="flex space-x-4">
        <button wire:click="posts" class="rounded-full py-1 px-1.5 border {{$filter == 'posts' ? '' : 'border-transparent'}} hover:border-gray-200  ">Posts</button>
        <button wire:click="comments" class="rounded-full py-1 px-1.5 border {{$filter == 'comments' ? '' : 'border-transparent'}} hover:border-gray-200">Comments</button>
        <button wire:click="likes" class="rounded-full py-1 px-1.5 border {{$filter == 'likes' ? '' : 'border-transparent'}} hover:border-gray-200">Likes</button>
        <button wire:click="dislikes" class="rounded-full py-1 px-1.5 border {{$filter == 'dislikes' ? '' : 'border-transparent'}} hover:border-gray-200">Dislikes</button>

    </div>
    @switch($filter)
        @case('posts')
            <x-profile.timeline.posts :user="$user"/>
            @break
        @case('comments')
            <x-profile.timeline.comments :user="$user"/>
            @break
        @case('likes')
            <x-profile.timeline.likes :user="$user"/>
            @break
        @case('dislikes')
            <x-profile.timeline.dislikes :user="$user"/>
        @default
            <div>

            </div>
            @break
    @endswitch

</div>
