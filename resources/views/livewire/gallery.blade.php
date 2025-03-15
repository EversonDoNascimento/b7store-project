  <div class="ad-area-left">    
    <div
    class="main-photo"
    style="background-image: url('{{ asset('/storage/' . $featured) ?? 'https://placehold.co/640x640' }}')"
    ></div>
    <div class="secundary-photos">
    @foreach($images as $image)
        <div
        wire:click="setMainImage({{ $image }})"
        class="secundary-image"
        style="background-image: url('{{ isset($image->url) ? asset('/storage/' . $image->url)  : 'https://placehold.co/640x640' }}'); opacity: {{ $image->url == $featured ? 1 : 0.5 }}; transition: all 0.5s ease-in-out;"
        ></div>
    @endforeach
    </div>
</div>