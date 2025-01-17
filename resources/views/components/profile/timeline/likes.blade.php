@foreach($user->likes as $like)
    <div wire:key="{{$like->id}}">
        <livewire:live-post :key="$like->id" :post="$like" :titleLink="true"></livewire:live-post>
    </div>
@endforeach
