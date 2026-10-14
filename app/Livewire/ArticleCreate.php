<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ArticleCreate extends Component
{
    use WithFileUploads;

    #[Validate('required|min:3|max:255')]
    public string $title = '';

    #[Validate('required|min:10')]
    public string $body = '';

    #[Validate('nullable|image|max:2048')]
    public $img;

    protected $messages = [
        'title.required' => 'Il titolo è obbligatorio',
        'title.min' => 'Il titolo richiede almeno 3 caratteri',
        'body.required' => 'Il testo è obbligatorio',
        'body.min' => 'Il testo richiede almeno 10 caratteri',
        'img.image' => 'Il file deve essere un\'immagine',
        'img.max' => 'L\'immagine non può superare 2 MB',
    ];

    public function store()
    {
        $this->validate();

        Article::create([
            'title' => $this->title,
            'body' => $this->body,
            'img' => $this->img ? $this->img->store('images', 'public') : null,
        ]);

        session()->flash('success', 'Articolo creato');

        return $this->redirectRoute('articles.index');
    }

    public function render()
    {
        return view('livewire.article-create');
    }
}