<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ArticleEdit extends Component
{
    use WithFileUploads;

    public Article $article;

    #[Validate('required|min:3|max:255')]
    public string $title = '';

    #[Validate('required|min:10')]
    public string $body = '';

    #[Validate('nullable|image|max:2048')]
    public $newImg;

    protected $messages = [
        'title.required' => 'Il titolo è obbligatorio',
        'title.min' => 'Il titolo richiede almeno 3 caratteri',
        'body.required' => 'Il testo è obbligatorio',
        'body.min' => 'Il testo richiede almeno 10 caratteri',
        'newImg.image' => 'Il file deve essere un\'immagine',
        'newImg.max' => 'L\'immagine non può superare 2 MB',
    ];

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->title = $article->title;
        $this->body = $article->body;
    }

    public function update()
    {
        $this->validate();

        $img = $this->article->img;

        if ($this->newImg) {
            if ($img) {
                Storage::disk('public')->delete($img);
            }
            $img = $this->newImg->store('images', 'public');
        }

        $this->article->update([
            'title' => $this->title,
            'body' => $this->body,
            'img' => $img,
        ]);

        session()->flash('success', 'Articolo modificato');

        return $this->redirectRoute('articles.index');
    }

    public function deleteImage()
    {
        if ($this->article->img) {
            Storage::disk('public')->delete($this->article->img);
            $this->article->update(['img' => null]);
        }
    }

    public function render()
    {
        return view('livewire.article-edit');
    }
}