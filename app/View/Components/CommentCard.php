<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CommentCard extends Component
{
    public $comment;

    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comment-card');
    }
}
