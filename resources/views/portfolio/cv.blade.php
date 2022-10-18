@extends('_base')

@section('title', 'Quentin Boulaire')

@section('styles')
  @vite('resources/_portfolio/scss/app.scss')
@endsection

@section('scripts')
    @vite('resources/js/helpers.js')
    @vite('resources/_portfolio/js/app.js')
@endsection

@section('body')
<body>
  <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0" style="font-family: 'Nunito', sans-serif;" class="antialiased">
    <header>
      <p>test</p>
    </header>

    <div class="main">

    </div>

    <footer>

    </footer>
  </div>
</body>
@endsection