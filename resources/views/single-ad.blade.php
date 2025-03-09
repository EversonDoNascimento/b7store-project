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
    <link rel="stylesheet" href="{{asset('assets/myAdsStyle.css')}}" />

    <title>B7Store</title>
  </head>
  
  <body>
    <x-base.header></x-base.header>
    <main>
      <div class="ad-area">
        @livewire('gallery', ['images' => $advertise->images])
        <div class="ad-area-right">
          <div class="categories-state">{{ $advertise['state'] ?? "" }} / {{ $advertise['category'] ?? "" }}</div>
          <div class="ad-page-title">{{ $advertise['title'] }}</div>
          <div class="ad-page-date">Publicado em {{$advertise['created_at']->format('d/m/Y')}} às {{$advertise['created_at']->format('H:i')}}</div>
          <div class="ad-page-price">R$ {{number_format(num: $advertise['price'], decimals: 2, decimal_separator: ',', thousands_separator: '.')}}</div>
          @if($advertise['negotiable'] === 1)
            <div class="contact">
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
          @if(count($relatedAds) > 0)
            @foreach ($relatedAds as $ad)
               <x-ads-card :ads="$ad" :isEdit="false"></x-ads-card>
            @endforeach
          @else
            <div class="no-ads">Nenhum anúncio relacionado</div>
          @endif
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
