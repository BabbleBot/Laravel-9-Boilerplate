@extends('_base')

@section('scripts')
    @vite('resources/js/helpers.js')
    @vite('resources/_webquest/js/app.js')
@endsection

@section('styles')
    @vite('resources/_webquest/scss/app.scss')
@endsection

@section('body')
  <body id="app" data-theme="smaug">
    <app-header></app-header>
  </body>
@endsection
