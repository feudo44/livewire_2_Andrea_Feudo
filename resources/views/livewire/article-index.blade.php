<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row justify-content-center">
        @forelse ($articles as $article)
            <div class="col-12 col-md-4 col-lg-3 mb-4 d-flex justify-content-center" wire:key="article-{{ $article->id }}">
                <div class="card" style="width: 18rem;">
                    @if ($article->img)
                        <img src="{{ asset('storage/' . $article->img) }}" class="card-img-top"
                            style="height: 290px; object-fit: cover;" alt="{{ $article->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('articles.show', $article) }}" class="btn btn-primary">Leggi di più</a>
                            @auth
                                <a href="{{ route('articles.edit', $article) }}" class="btn btn-outline-warning">Modifica l'articolo</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Nessun articolo presente.</p>
        @endforelse
    </div>
</div>