<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Films</title>

  <!-- Add Bootstrap CSS link -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://unpkg.com/@webpixels/css@1.2.6/dist/index.css" rel="stylesheet">

  <!-- Include any additional stylesheets or scripts here -->
</head>

<body class="d-flex flex-column min-vh-100">

  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-0 py-3">
      <div class="container-xl">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
          <!-- <img src="https://preview.webpixels.io/web/img/logos/clever-light.svg" class="h-8" alt="..."> -->
          <img src="" class="h-8" alt="...">
        </a>
        <!-- Navbar toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <!-- Nav -->
          <div class="navbar-nav mx-lg-auto">
            <a class="nav-item nav-link rounded m-2 py-2 {{ Route::currentRouteName() == 'welcome' ? 'active' : '' }}" href="{{ route('welcome') }}">Principal</a>
            <a class="nav-item nav-link rounded m-2 py-2 {{ Route::currentRouteName() == 'listFilms' ? 'active' : '' }}" href="{{ route('listFilms') }}">Listas</a>
            <a class="nav-item nav-link rounded m-2 py-2 {{ Route::currentRouteName() == 'countFilms' ? 'active' : '' }}" href="{{ route('countFilms') }}">Contador</a>
          </div> 
          <!-- Right navigation -->
          <div class="navbar-nav ms-lg-4"></div>
          <!-- Action -->
          <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
            <a href="{{ route('formFilm') }}" class="btn btn-sm btn-danger w-full w-lg-auto">Añadir película</a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  {{ $slot }}

  <footer class="mt-auto bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2025 Copyright
      <a class="text-white" href="#">Films, Akisha Angeles</a>
    </div>
    <!-- Copyright -->
  </footer>

</body>

</html>