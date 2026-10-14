<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h1 class="display-4 text-center mb-4">Accedi!</h1>

            <form wire:submit="authenticate">
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model="email">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password:</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model="password">
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="remember" wire:model="remember">
                    <label class="form-check-label" for="remember">Ricordami</label>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">Accedi</button>
                    <span>
                        Non hai un account?
                        <a href="{{ route('register') }}" class="btn btn-outline-warning ms-1">Registrati</a>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>