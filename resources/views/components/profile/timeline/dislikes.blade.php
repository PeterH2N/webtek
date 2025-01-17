@foreach($user->dislikes as $dislike)
    <div wire:key="{{$dislike->id}}">
        <livewire:live-post :key="$dislike->id" :post="$dislike" :titleLink="true"></livewire:live-post>
    </div>
@endforeach
