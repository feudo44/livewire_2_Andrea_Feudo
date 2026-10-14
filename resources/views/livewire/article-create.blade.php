<div class="container mt-4">
    <h1 class="mb-4">Nuovo articolo</h1>

    <form wire:submit="store">
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
            <input type="file" class="form-control @error('img') is-invalid @enderror" wire:model="img" accept="image/*">
            @error('img') <div class="invalid-feedback">{{ $message }}</div> @enderror

            @if ($img)
                <img src="{{ $img->temporaryUrl() }}" class="img-thumbnail mt-2" style="max-width: 200px;" alt="Anteprima">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</div>