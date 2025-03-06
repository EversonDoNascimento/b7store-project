  <div class="ad-area-left">
    <div
    class="main-photo"
    style="background-image: url('{{ $advertise['main_image']['url'] ?? 'https://placehold.co/640x640' }}')"
    ></div>
    <div class="secundary-photos">
    @foreach ($advertise['images'] as $image)
        <div
        
        wire:click="setMainImage({{ $image }})"
        class="secundary-image"
        style="background-image: url('{{ $image['url'] }}'); opacity: {{ $image['id'] == $advertise['main_image']['id'] ? 1 : 0.5 }}; transition: all 0.5s ease-in-out;"
        ></div>
    @endforeach
    </div>
</div>