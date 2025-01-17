<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Reply extends Component
{

    public Post $comment;
    public int $depth;
    public bool $collapseReplies;

    /*protected function queryString() {
        return [
            'collapseReplies' => [
                'as' => 'cr' . $this->comment->id,
            ],
        ];
    }*/

    public function mount(Post $comment, int $depth): void
    {
        $this->comment = $comment;
        $this->depth = $depth;
        $this->collapseReplies = false;
        if ($depth === 0) {
            $this->collapseReplies = true;
        }
    }

    public function collapse(): void
    {
        $this->collapseReplies = true;
    }

    public function expand(): void {
        $this->collapseReplies = false;
    }

    public function render()
    {
        return view('components.post.reply', ['comment'=>$this->comment, 'depth'=>$this->depth, 'collapseReplies'=>$this->collapseReplies]);
    }
}
