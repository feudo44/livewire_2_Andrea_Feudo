<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ArticleShow extends Component
{
    public Article $article;

    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function destroy()
    {
        // Solo l'autore può eliminare l'articolo
        abort_unless(auth()->id() === $this->article->user_id, 403);

        if ($this->article->img) {
            Storage::disk('public')->delete($this->article->img);
        }

        $this->article->delete();

        session()->flash('success', 'Articolo eliminato');

        return $this->redirectRoute('articles.index');
    }

    public function render()
    {
        return view('livewire.article-show');
    }
}