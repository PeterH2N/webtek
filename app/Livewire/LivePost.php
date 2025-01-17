<?php

namespace App\Livewire;
use App\Models\Post;
use Livewire\Attributes\Url;
use Livewire\Component;


class LivePost extends Component
{

    public Post $post;


    public bool $showComments = false;
    public bool $titleLink;

    /*protected function queryString()
    {
        return [
          'showComments' => [
              'as' => "sc" . $this->post->id,
          ],
        ];
    }*/

    public function mount(Post $post, bool $titleLink = false): void
    {
        $this->post = $post;
        $this->titleLink = $titleLink;
    }

    public function toggleShowComments(): void {
        $this->showComments = !$this->showComments;
    }


    public function render()
    {
        return view('components.post.post', ['post' => $this->post, 'showComments' => $this->showComments]);
    }
}
