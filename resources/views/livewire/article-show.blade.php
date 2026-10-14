<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="display-5 text-center mb-5">Dettagli dell'articolo: {{ $article->title }}</h1>
        </div>
    </div>

    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-5 text-center mb-4">
            <p class="fs-5">{{ $article->body }}</p>
            <p class="text-muted">Scritto da {{ $article->user?->name ?? 'autore sconosciuto' }}</p>

            <div class="d-flex justify-content-center gap-2 mt-4">
                <a href="{{ route('articles.index') }}" class="btn btn-secondary">Indietro</a>

                @if (auth()->id() === $article->user_id)
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-outline-warning">Modifica l'articolo</a>
                    <button wire:click="destroy"
                        wire:confirm="Vuoi davvero eliminare questo articolo?"
                        class="btn btn-danger">Elimina</button>
                @endif
            </div>
        </div>

        <div class="col-12 col-md-4 mb-4">
            @if ($article->img)
                <img src="{{ asset('storage/' . $article->img) }}"
                    class="img-fluid rounded shadow" alt="{{ $article->title }}">
            @endif
        </div>
    </div>
</div>