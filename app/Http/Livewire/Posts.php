<?php

namespace App\Http\Livewire;

use App\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;
    public $title;
    public $content;


    public function save()
    {
        $this->validate([
            'title' => 'required|min:10|max:30',
            'content' => 'required'
        ]);
        $data = [
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => auth()->user()->id
        ];
        Post::create($data);
        $this->cleanVars();
    }

    private function cleanVars()
    {
        $this->title = null;
        $this->content = null;
    }

    public function render()
    {
        return view('livewire.posts', [
            'posts' => Post::where('user_id', '=', auth()->user()->id)->latest()->paginate(3)
        ]);
    }
}
