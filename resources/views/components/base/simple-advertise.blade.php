<a href="{{$data['href'] ?? '#'}}" class="ad-item">
    <div
        class="ad-image"
        style="background-image: url({{$data['photo']  ?? 'http://placehold.it/150x150'}})"
    ></div>
    <div class="ad-title">{{$data['title'] ?? "Default"}}</div>
    <div class="ad-price">{{$data['price'] ?? "Default"}}</div>
</a>