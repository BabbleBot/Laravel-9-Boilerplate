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
  <main>
    <aside>
      <header>
        <h1>Quentin<br>Boulaire</h1>
        <h2>Développeur Fullstack</h2>
        <img class="photo" src="/img/portfolio/photo.jpg" alt="Photo">
        {{-- <section class="text">
        </section> --}}
        {{-- <div></div> --}}
        {{-- <img class="qr-code" src="/img/portfolio/qr-code.png" alt="QRcode"> --}}
      </header>

      <section>
        <h3>Informations Personnelles</h3>
        <address class="container">
          <a href="http://maps.google.com/?q={{$infos['address']['main']}}" target="_blank">
            <h4>{{-- <i class="fa-solid fa-map-marker-alt"></i> --}} Adresse</h4>
            <p>{{$infos['address']['main']}}</p>
          </a>
          <a href="tel:{{str_replace(' ', '', $infos['phone'])}}">
            <h4>{{-- <i class="fa-solid fa-phone"></i> --}} Téléphone</h4>
            <p>{{$infos['phone']}}</p>
          </a>
          <a href="mailto:{{$infos['email']}}">
            <h4>{{-- <i class="fa-solid fa-envelope"></i> --}} Email</h4>
            <p>{{$infos['email']}}</p>
          </a>
        </address>
      </section>

      <section>
        <h3>Web</h3>
        @foreach($skills as $skill)
            <section class="skill-detail">
              <h4 class="compact">{{$skill['title']}}</h4>
              @foreach($skill['content'] as $line)
                <p>{{is_array($line) ? implode(', ', $line) : $line}}</p>
              @endforeach
            </section>
          @endforeach
      </section>

      <section>
        <h3>Langues</h3>
        @foreach($languages as $language)
            <section class="skill-detail">
              <h4 class="compact">{{$language['title']}}</h4>
              <p>{{$language['content']}}</p>
            </section>
          @endforeach
      </section>

      {{-- <section>
        <h3>Interests</h3>
        @foreach($interests as $interest)
            <section class="skill-detail">
              <h4 class="compact">{{$interest['title']}}</h4>
                @foreach($interest['content'] as $line)
                  <p>{{is_array($line) ? implode(', ', $line) : $line}}</p>
                @endforeach
            </section>
          @endforeach
      </section> --}}
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