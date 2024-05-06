<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Layout;

class CreatePost extends Component
{
    public $title = 'Halaman Create Post';

    public $idPost;
    public $email;
    public $name;
    public $uemail;
    public $uname;

    public $posts = 'null';

    #[Layout('components.layouts.app')]

    public function save()
    {
        try {
            Post::create(
                $this->only(['email', 'name'])
            );
            session()->flash('status', 'Post successfully created.');
            $this->name = '';
            $this->email = '';
        } catch (\Exception $e) {
            // Tangkap pengecualian jika terjadi kesalahan integritas
            if ($e === 1062) {
                // Kolom 'email' memiliki kunci unik dan mengalami duplikasi
                session()->flash('status', 'Email already exists.'); // Pesan kesalahan yang lebih ramah
            } else {
                // Penanganan pengecualian lain jika diperlukan
                session()->flash('status', 'Email already exists.'); // Pesan kesalahan umum
            }
        }
        // return $this->redirect('/');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        session()->flash('status', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        // dd($post->id);
        $this->idPost = $post->id;
        $this->uemail = $post->email;
        $this->uname = $post->name;
    }
    public function update(){
        $rule = [
            'uname'=> 'required',
            'uemail'=> 'required|email',
        ];
        $validated = $this->validate($rule);
        $data = Post::find($this->idPost);
        // dd($data);
        $data->update([
            'email'=> $this->uemail,
            'name'=> $this->uname
        ]);
        session()->flash('status', 'Data berhasil diupdate!');

    }
    public function render()
    {
        $this->posts = Post::all();
        
        
        return view('livewire.create-post');
    }
}
