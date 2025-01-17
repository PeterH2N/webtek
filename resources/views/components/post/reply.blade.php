<div class="flex space-x-3">
    {{-- Thread depth indicator --}}
    @if($depth != 0)
        <div class="w-[1px] border-l ml-[10px]"></div>
    @endif
    <div class="mt-2">
        <div class="space-x-0">
            <div class="flex space-x-1">
                <a class="text-sm flex hover:underline" href="/profile/{{$comment->user->username}}"> <p>@</p> {{ $comment->user->username }}</a>
                <div class="text-xs self-center">{{$comment->created_at->diffForHumans()}}</div>
            </div>
            <p class="pr-4">{{$comment->content}}</p>
        </div>
        {{-- Likes and dislikes--}}
        <div class="flex flex-row-reverse pr-4">
            <div class="text-sm self-center mx-1"> {{$comment->dislikes->count()}} </div>
            {{view('components.ui.dislike', ['post'=>$comment, 'size'=>5])}}
            <div class="w-[1px] border-l mx-1"></div>
            <div class="text-sm self-center mx-1"> {{$comment->likes->count()}} </div>
            {{view('components.ui.like', ['post'=>$comment, 'size'=>5])}}
            {{-- Collapse button --}}
            @if($comment->comments->count() > 0)
                @if($collapseReplies)
                    <button wire:click="expand" class="flex mr-auto hover:underline">
                        <x-bx-chevron-down class="w-5 h-5 self-center"/>
                        <span class="text-xs self-center ">
                            Show {{$comment->commentCount()}}
                            @if($comment->commentCount() == 1)
                                reply
                            @else
                                replies
                            @endif
                        </span>

                    </button>
                @else
                    <button wire:click="collapse" class="flex mr-auto hover:underline">
                        <x-bx-chevron-up class="w-5 h-5 self-center"/>
                        <span class="text-xs self-center ">Collapse</span>
                    </button>
                @endif
            @endif
        </div>
        {{-- Nested comments --}}
        @if(!$collapseReplies)
            @foreach($comment->comments as $reply)
                <div wire:key="{{$reply->id}}" >
                    <livewire:reply :comment="$reply" :depth="$depth+1" :key="$reply->id" />
                </div>

            @endforeach
        @endif
    </div>
</div>
