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

    <title>B7Store - Anúncios</title>
  </head>

  <body>
    <x-base.header></x-base.header>
    <livewire:list-ads />
    <x-base.footer></x-base.footer>
  </body>
</html>
