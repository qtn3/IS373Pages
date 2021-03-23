<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;
use App\Models\Post;
use App\Models\User;

class Posts extends Component
{
    public $posts, $title, $body, $post_id, $author, $published, $hyperlink;
    public $isOpen = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $user = auth()->user();

        $this->posts = $user->posts;
        return view('livewire.posts');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->body = '';
        $this->post_id = '';
        $this->author = '';
        $this->published = '';
        $this->hyperlink = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
            'author' => 'required',
            'published' => 'required',
            'hyperlink' => 'required'
        ]);

        Post::updateOrCreate(['id' => $this->post_id], [
            'title' => $this->title,
            'body' => $this->body,
            'author' => $this->author,
            'published' => $this->published,
            'hyperlink' => $this->hyperlink
        ]);

        Page::updateOrCreate(['id' => $this->post_id], [
            'title' => $this->title,
            'body' => $this->body,
            'publish' => $this->published
        ]);

        session()->flash('message',
            $this->post_id ? 'Post Updated Successfully.' : 'Post Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->body = $post->body;
        $this->author = $post->author;
        $this->published = $post->published;
        $this->hyperlink = $post->hyperlink;
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
