@extends('layouts._')

@section('body')
    <body>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0" style="font-family: 'Nunito', sans-serif;" class="antialiased">
            @yield('content')
        </div>
    </body>
@endsection
