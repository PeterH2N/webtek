@foreach($user->posts->sortByDesc('created_at') as $post)
    <div wire:key="{{$post->id}}">
        <livewire:live-post :key="$post->id" :post="$post" :titleLink="true"></livewire:live-post>
    </div>
@endforeach
