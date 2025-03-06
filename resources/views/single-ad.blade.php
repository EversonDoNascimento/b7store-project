<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Open+Sans:ital@0;1&family=Oswald:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('assets/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/adPageStyle.css')}}" />
    <title>B7Store</title>
  </head>
  
  <body>
    <x-base.header></x-base.header>
    <main>
      <div class="ad-area">
        <div class="ad-area-left">
          <div
            class="main-photo"
            style="background-image: url('{{ $advertise['main_image']['url'] ?? 'https://placehold.co/640x640' }}')"
          ></div>
          <div class="secundary-photos">
            @foreach ($advertise['images'] as $image)
                <div
                class="secundary-image"
                style="background-image: url('{{ $image['url'] }}')"
                ></div>
            @endforeach
          </div>
        </div>
        <div class="ad-area-right">
          <div class="categories-state">{{ $advertise['state'] ?? "" }} / {{ $advertise['category'] ?? "" }}</div>
          <div class="ad-page-title">{{ $advertise['title'] }}</div>
          <div class="ad-page-date">Publicado em {{$advertise['created_at']->format('d/m/Y')}} às {{$advertise['created_at']->format('H:i')}}</div>
          <div class="ad-page-price">R$ {{number_format(num: $advertise['price'], decimals: 2, decimal_separator: ',', thousands_separator: '.')}}</div>
          <div class="contact">
          @if($advertise['negotiable'] === 1)
            <img src="{{asset('assets/icons/wppIcon.png')}}" />
            <div class="contact-text">Negociável</div>
          </div>
            <div class="negociable">*Esse valor poderá ser negociado.</div>
             @endif
          <div class="ad-page-text">
            {{ $advertise['description'] }}
          </div>
          <button onclick="callMe('{{$advertise['contact']}}','{{$advertise['title']}}')" class="get-touch">Entrar em contato</button>
          <div class="views">
            <img src="{{ asset('assets/icons/eyeGrayIcon.png') }} " />
            <div class="views-text">{{ $advertise['views'] }} visualizações neste anúncio</div>
          </div>
        </div>
      </div>
      <div class="ads">
        <div class="ads-title">Anúncios relacionados</div>
        <div class="ads-area">
          <div class="ad-item">
            <div
              class="ad-image"
              style="background-image: url('/assets/adFusca/fusca6.png')"
            ></div>
            <div class="ad-title">Volkswagen Fusca 67 - Equipado</div>
            <div class="ad-price">R$ 33.990,00</div>
          </div>
          <div class="ad-item">
            <div
              class="ad-image"
              style="background-image: url('/assets/adFusca/fusca7.png')"
            ></div>
            <div class="ad-title">Volkswagen Fusca 67 - Extra</div>
            <div class="ad-price">R$ 36.900,00</div>
          </div>
          <div class="ad-item">
            <div
              class="ad-image"
              style="background-image: url('/assets/adFusca/fusca8.png')"
            ></div>
            <div class="ad-title">Volkswagen Fusca 68</div>
            <div class="ad-price">R$ 34.450,00</div>
          </div>
          <div class="ad-item">
            <div
              class="ad-image"
              style="background-image: url('/assets/adFusca/fusca9.png')"
            ></div>
            <div class="ad-title">Volkswagen Fusca 66</div>
            <div class="ad-price">R$ 35.450,00</div>
          </div>
        </div>
      </div>
    </main>
    <x-base.footer></x-base.footer>
    <script>
      function callMe(number, title) {
        const message = "Olá, gostaria de saber mais sobre o anuncio: " + title;
        window.open(`https://wa.me/55${number}?text=${message}`, '_blank');
      }
    </script>
  </body>
</html>
