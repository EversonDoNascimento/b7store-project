<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/myAccountStyle.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/myAdsStyle.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/newAdStyle.css') }}" />
    <title>B7Store - Editar Anúncio</title>
  </head>
  <body>
    <!-- Header -->
    <x-base.header></x-base.header>
    <!-- /Header -->
    <!-- ad-edit -->
    <livewire:ad-edit :id="$id"></livewire:ad-edit>
    <!-- /ad-edit -->
    <!-- Footer -->
    <x-base.footer></x-base.footer>
    <!-- /Footer -->
  </body>
</html>
