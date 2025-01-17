@foreach($user->comments->sortByDesc('created_at') as $comment)
    <div wire:key="{{$comment->id}}">
        <div class="border p-2">
            @php($parentPost = $comment->parentPost())
            <a href="{{route('post.show', ['id'=>$parentPost->id, 's'=>'true'])}}" class="text-sm hover:underline">See related post</a>
            <livewire:reply :comment="$comment" :depth="0" :key="$comment->id" />
        </div>
    </div>
@endforeach
