@extends('_base')

@section('title', 'Quentin Boulaire')

@section('styles')
  @vite('resources/_portfolio/scss/app.scss')
@endsection

@section('scripts')
    @vite('resources/js/helpers.js')
    @vite('resources/_portfolio/js/app.js')
    <script src="https://kit.fontawesome.com/4a7df6b10d.js" crossorigin="anonymous"></script>
@endsection

@section('body')
<body>
  <header id="header">
    <div class="pres">
      <img class="photo" src="/img/portfolio/photo.jpg" alt="Photo">
      <section class="text">
        <h1>Quentin Boulaire</h1>
        <h2>Développeur Fullstack</h2>
      </section>
      <div></div>
      <img class="qr-code" src="/img/portfolio/qr-code.png" alt="QRcode">
    </div>

    <address>
      <a href="tel:{{str_replace(' ', '', $infos['phone'])}}">
        <i class="fa-solid fa-phone"></i>
        {{$infos['phone']}}
      </a>
      <a href="mailto:{{$infos['email']}}">
        <i class="fa-solid fa-envelope"></i>
        {{$infos['email']}}
      </a>
      <a href="http://maps.google.com/?q={{$infos['address']['main']}}" target="_blank">
        <i class="fa-solid fa-map-marker-alt"></i>
        {{$infos['address']['main']}}
      </a>
    </address>
  </header>

  <main>
    <aside>
      @foreach($skills as $skillCat)
        <section class="skill-category">
          <h3>{{$skillCat['categoryTitle']}}</h3>
          @foreach($skillCat['categoryContent'] as $skill)
            <section class="skill-detail">
              <h4 class="{{is_array($skill['skillContent']) ? '' : ' compact'}}">{{$skill['skillTitle']}}</h4>
              @if(is_array($skill['skillContent']))
                @foreach($skill['skillContent'] as $line)
                  <p>{{is_array($line) ? implode(', ', $line) : $line}}</p>
                @endforeach
              @else
                <p>{{$skill['skillContent']}}</p>
              @endif
            </section>
          @endforeach
        </section>
      @endforeach
    </aside>
    <section id="journey">
      <section class="motivation">
        <p>
          Développeur Web Fullstack avec plus de 7 ans d'expérience.
          Mordu d'informatique, j'ai appris à coder dès mon plus jeune âge dans divers langages informatiques.
          Polyvalent, je maîtrise les différentes étapes de création d'un site ou d'une application web:
          De la compréhension des besoins utilisateurs au développement des fonctionalités front & back.
        </p>
      </section>
      <section class="experiences">
        <h3>Expérience Professionelle</h3>
        @foreach($experiences as $experience)
          <section class="experience">
            <h4 class="title">{{$experience['title']}}</h4>
            <div class="dates">
              <p>{{$experience['dates']['start']." - "}}</p>
              <p>{{$experience['dates']['end']}}</p>
            </div>
            @if(isset($experience['company']))
              <div class="company">
                <div class="name">{{$experience['company']['name']}}</div>
                <div class="location">{{$experience['company']['location']}}</div>
              </div>
            @endif
            <ul class="missions">
              @foreach ($experience['missions'] as $mission)
                <li>{{$mission}}</li>
              @endforeach
            </ul>
          </section>
        @endforeach
      </section>
      <section class="formations">
        <h3>Formations</h3>
        @foreach ($formations as $formation)
        <section class="formation">
          <h4 class="title">{{$formation['title']}}</h4>
          <div class="dates">
            <p>{{$experience['dates']['start']." - "}}</p>
            <p>{{$experience['dates']['end']}}</p>
          </div>
          <div class="location">{{$experience['company']['location']}}</div>
        </section>
        @endforeach
      </section>
    </section>
  </main>

  <footer id="footer">
    <p><a href="{{route('portfolio.cv')}}">Retrouvez moi sur internet</a></p>
  </footer>
  {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0" style="font-family: 'Nunito', sans-serif;" class="antialiased">
  </div> --}}
</body>
@endsection