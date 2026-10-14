<div class="container mt-4">
    <h1 class="mb-4">Modifica articolo</h1>

    <form wire:submit="update">
        <div class="mb-3">
            <label class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model.blur="title">
            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Testo</label>
            <textarea rows="6" class="form-control @error('body') is-invalid @enderror" wire:model.blur="body"></textarea>
            @error('body') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Immagine</label>

            @if ($article->img)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $article->img) }}" class="img-thumbnail" style="max-width: 200px;" alt="{{ $article->title }}">
                    <button type="button" wire:click="deleteImage"
                        wire:confirm="Eliminare l'immagine?"
                        class="btn btn-outline-danger btn-sm ms-2">Elimina immagine</button>
                </div>
            @endif

            <input type="file" class="form-control @error('newImg') is-invalid @enderror" wire:model="newImg" accept="image/*">
            @error('newImg') <div class="invalid-feedback">{{ $message }}</div> @enderror

            @if ($newImg)
                <img src="{{ $newImg->temporaryUrl() }}" class="img-thumbnail mt-2" style="max-width: 200px;" alt="Anteprima">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Aggiorna</button>
        <a href="{{ route('articles.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>