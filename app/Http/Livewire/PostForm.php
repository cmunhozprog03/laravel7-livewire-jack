<?php

namespace App\Http\Livewire;

use App\Post;
use Livewire\Component;

class PostForm extends Component
{
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
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
        $this->cleanVars();
    }

    private function cleanVars()
    {
        $this->title = null;
        $this->content = null;
    }
    public function render()
    {
        return view('livewire.post-form');
    }
}
