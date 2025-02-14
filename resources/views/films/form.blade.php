<x-layout>
    <!-- Use d-flex to make the parent container a flexbox, align and justify to center -->
    <div class="d-flex justify-content-center align-items-center vh-100 my-10">
        <!-- Card with w-50 for width and p-3 for padding -->
        <div class="card w-50 p-3">
            <h1 class="mx-auto mt-3 text-danger" style="font-family: 'Gloock', serif">Añade tu película</h1>
            <div class="card-body">
                <form method="POST" action="{{ isset($film) ? route('saveFilm', ['filmId' => $film->id]) : route('saveFilm') }}">
                    @csrf
                    <div class="mb-5">
                        <label class="form-label" for="name">Título <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ isset($film) ? $film->name : old('name') }}">
                        @if (session('error'))
                            <p class="text-danger text-xs mt-2">{{ session('error') }}</p>
                        @endif
                        @error('name')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="form-label" for="year">Año <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="year" name="year" value="{{ isset($film) ? $film->year : old('year') }}">
                        @error('year')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="form-label" for="genre">Género <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="genre" name="genre" value="{{ isset($film) ? $film->genre : old(key: 'genre') }}">
                        @error('genre')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="form-label" for="country">País <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="country" name="country" value="{{ isset($film) ? $film->country : old(key: 'country') }}">
                        @error('country')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="form-label" for="duration">Duración <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="duration" name="duration" value="{{ isset($film) ? $film->duration : old(key: 'duration') }}">
                        @error('duration')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label class="form-label" for="img_url">Portada <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="img_url" name="img_url" value="{{ isset($film) ? $film->img_url : old(key: 'img_url') }}">
                        @if (session(key: 'error_url'))
                            <p class="text-danger text-xs mt-2">{{ session('error_url') }}</p>
                        @endif
                        @error('img_url')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-danger w-100">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
