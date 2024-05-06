<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ViewPost extends Component
{
    public $posts;
   
    public function mount(){
        
        
    }
    public function delete($id){
        $post = Post::findOrFail($id);
        $post->delete();
        session()->flash('status', 'Data berhasil dihapus');
    }

    public $id;
    public $email;
    public $name;
    public function edit(){
        $edit = Post::where('id', $this->id)->first();
        $edit->email = $this->email;
        $edit->name = $this->name;
        $edit->save();
        return $this->redirect('/');

    }
    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.view-post');
    }
}
