<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h1 class="display-4 text-center mb-4">Registrati!</h1>

            <form wire:submit="save">
                <div class="mb-3">
                    <label class="form-label">Nome utente:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.blur="name">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model.blur="email">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password:</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model="password">
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Conferma password:</label>
                    <input type="password" class="form-control" wire:model="password_confirmation">
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">Registrati</button>
                    <span>
                        Hai già un account?
                        <a href="{{ route('login') }}" class="btn btn-outline-warning ms-1">Fai il login</a>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>