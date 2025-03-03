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
                Você ainda não possui anúncios cadastrados
              </div>
            @else
            @foreach ($advertises as $ads)
               <x-ads-card :ads="$ads" :isEdit="true"></x-ads-card>
            @endforeach
            @endif
            
           
          </div>
        </div>
      </div>
    </main>
    <x-base.footer></x-base.footer>
  </body>
</html>
