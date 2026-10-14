<x-layouts.app>
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        <h1 class="display-3 text-center mt-5 pt-5">Homepage</h1>
    </div>
</x-layouts.app>