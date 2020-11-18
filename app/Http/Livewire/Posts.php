<?php

namespace App\Http\Livewire;

use App\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;
    public $action;
    public $selectedItem;
   

    protected $paginationTheme = 'bootstrap';
    
    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    public function selectedItem($itemId, $action)
    {
        $this->selectedItem = $itemId;
        
        If($action == 'delete')
        {
            $this->dispatchBrowserEvent('openDeleteModal');
        } else{
            $this->emit('getModelId', $this->selectedItem);
            $this->dispatchBrowserEvent('openModal');
        }
    }

    public function delete()
    {
        Post::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }


    public function render()
    {
        return view('livewire.posts', [
            'posts' => Post::where('user_id', '=', auth()->user()->id)->latest()->paginate(3)
        ]);
    }
}
