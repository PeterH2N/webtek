<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Component;

class CreatePost extends Component
{
    public string $title = '';
    public string $content = '';

    public function save() {
        //$this->validate();

        $post = new Post();
        $post->title = $this->title;
        $post->content = $this->content;
        $post->user_id = Auth::user()->id;

        $post->save();

        $this->redirect(route('profile.show', ['username' => Auth::user()->username]));
    }

    public function cancel(): RedirectResponse
    {
        return back();
    }

    public function render()
    {
        return view('components.post.create-post');
    }
}
