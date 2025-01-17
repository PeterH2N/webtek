{{-- Post card --}}
<div class="border p-2 space-y-2 flex flex-col">
    {{-- Title and OP --}}
    <div class="space-y-0">
        @if($titleLink)
            <a href="{{route('post.show', ['id'=>$post->id, 'sc' . $post->id=>true])}}" class="text-xl hover:underline">
                {{$post->title}}
            </a>
        @else
            <div class="text-xl"> {{$post->title}} </div>
        @endif

        <div class="flex space-x-1">
            <a class="text-sm flex hover:underline" href="/profile/{{$post->user->username}}" > <p>@</p> {{ $post->user->username }}</a>
            <div class="text-xs self-center">{{$post->created_at->diffForHumans()}}</div>
        </div>

    </div>

    <div class="block border-0 h-[1px] p-0 border-t"></div>
    {{-- Content --}}
    <p>
        {{$post->content}}
    </p>
    <div class="block border-0 h-[1px] p-0 border-t"></div>
    {{-- Likes and dislikes --}}
    <div class="flex space-x-1">
        {{view('components.ui.like', ['post'=>$post, 'size'=>6])}}
        <p> {{$post->likes->count()}} </p>
        <div class="w-[1px] border-l"></div>
        {{view('components.ui.dislike', ['post'=>$post, 'size'=>6])}}
        <p> {{$post->dislikes->count()}} </p>
        <div class="w-[1px] border-l"></div>
        @if ($post->comments->count() == 0)
            <x-bx-comment class="w-6 h-6"/>
            No comments
        @else
            <button wire:click="toggleShowComments" class="hover:underline flex">
                <x-bx-comment class="w-6 h-6"/>
                @if($showComments)
                    Hide comments
                @else
                    Show {{$post->commentCount()}} comments
                @endif
            </button>
        @endif



    </div>


    {{-- Comments --}}
    @if ($showComments)
        <div class="pl-2">
            @foreach($post->comments as $comment)
                <div class="space-y-2 flex flex-col">
                    <!-- Comment -->
                    <livewire:reply :comment="$comment" :depth="0" :key="$comment->id"/>
                </div>
            @endforeach
        </div>
    @endif



</div>
