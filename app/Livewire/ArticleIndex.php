<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleIndex extends Component
{
    public function render()
    {
        return view('livewire.article-index', [
            'articles' => Article::latest()->get(),
        ]);
    }

    public function store()
{
    $this->validate();

    Article::create([
        'title' => $this->title,
        'body' => $this->body,
        'img' => $this->img ? $this->img->store('images', 'public') : null,
        'user_id' => Auth::id(),
    ]);

    session()->flash('success', 'Articolo creato con successo');

    return $this->redirectRoute('home');
}
}