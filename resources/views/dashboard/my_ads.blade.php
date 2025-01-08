<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('assets/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/myAccountStyle.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/myAdsStyle.css')}}" />

    <title>B7Store - Meus anúncios</title>
  </head>

  <body>
    <x-base.header></x-base.header>
    <main>
      <div class="my-ads-page">
       <x-base.side-bar></x-base.side-bar>
        <div class="myAds-area">
          <h3 class="myAds-title">Meus Anúncios</h3>
          <div class="myAds-ads-area">
            @if(count($advertises) == 0)
              <div>
                Sem anúncios
              </div>
            @else
            @foreach ($advertises as $ads)
              <div class="my-ad-item">
                <div class="ad-image-area">
                  <div class="ad-buttons">
                    <div class="ad-button">
                      <img src="assets/icons/deleteIcon.png" />
                    </div>
                    <div class="ad-button">
                      <img src="assets/icons/editIcon.png" />
                    </div>
                  </div>
                  <div
                    class="ad-image"
                    style="background-image: url('{{$ads->images->where('featured', 1)->first()->url ?? 'http://placehold.it/150x150'}}')"
                  ></div>
                </div>
                <div class="ad-title">{{$ads->title}}</div>
                <div class="ad-price">R$ {{number_format(num: $ads->price, decimals: 2, decimal_separator: ',', thousands_separator: '.')}}</div>
              </div>
        
            @endforeach
            @endif
            
           
          </div>
        </div>
      </div>
    </main>
    <x-base.footer></x-base.footer>
  </body>
</html>
