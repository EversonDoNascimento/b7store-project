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