<div class="my-ad-item">
        <div class="ad-image-area">
                <div class="ad-buttons">
                    @if(Auth::check() && $ads->user_id == Auth::user()->id)
                            <div class="ad-button">
                                <img src="assets/icons/deleteIcon.png" />
                            </div>
                            <div class="ad-button">
                                <img src="assets/icons/editIcon.png" />
                            </div>
                    @endif
                        </div>
                    <div
                    class="ad-image"
                    style="background-image: url({{ $ads->images->where('featured', 1)->first()->url ?? 'http://placehold.it/150x150'}})"
                    ></div>
                </div>
            <div class="ad-title">{{$ads->title}}</div>
        <div class="ad-price">R$ {{number_format(num: $ads->price, decimals: 2, decimal_separator: ',', thousands_separator: '.')}}</div>
</div>