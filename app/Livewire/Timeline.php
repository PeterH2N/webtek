<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;

class Timeline extends Component
{
    public User $user;
    #[Url]
    public string $filter = 'posts';

    public function mount(User $user): void {
        $this->user = $user;
    }

    public function posts(): void {
        if ($this->filter == 'posts') return;
        $this->filter = 'posts';
    }

    public function likes(): void
    {
        if ($this->filter == 'likes') return;
        $this->filter = 'likes';
    }

    public function comments(): void
    {
        if ($this->filter == 'comments') return;
        $this->filter = 'comments';
    }

    public function dislikes(): void
    {
        if ($this->filter == 'dislikes') return;
        $this->filter = 'dislikes';
    }

    public function render()
    {
        return view('components.profile.timeline', ['user'=>$this->user, 'filter'=>$this->filter]);
    }
}
