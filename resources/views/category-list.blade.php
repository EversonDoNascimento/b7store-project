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
    <link rel="stylesheet" href="{{asset('assets/adsListStyle.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/myAdsStyle.css')}}" />
    <script src="https://cdn.tailwindcss.com"></script>


    <title>B7Store - Anúncios</title>
  </head>

  <body>
    <x-base.header></x-base.header>
    <main>
        <div class="ads">
            <div class="ads-title">Anúncio da categoria: <b>{{$category['name']}}</b></div>
            <div class="ads-area">
                @if(count($ads) > 0)
                
                  @foreach ($ads as $ad)
                    <a href="{{route('ad.show', ['slug' => $ad['slug']])}}" text-decoration: none" class="my-ad-item">
                          <div class="ad-image-area">
                              <div
                              class="ad-image"
                              style="background-image: url({{ $ad->images->first()->url ?? 'https://placehold.co/600x400'}})"
                              ></div>
                          </div>
                              <div class="ad-title">{{$ad['title']}}</div>
                          <div class="ad-price">R$ {{number_format(num: $ad['price'], decimals: 2, decimal_separator: ',', thousands_separator: '.')}}</div>
                      </a>
                  @endforeach
                @else
                    <div class="no-ads">Nenhum anúncio relacionado</div>
                @endif
            </div>
            <div class="mt-8 ">{{$ads->links()}}</div>
        </div>
    </main>
     
    <x-base.footer></x-base.footer>
  </body>
</html>
