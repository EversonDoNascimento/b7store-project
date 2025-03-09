<style>
    .my-ad-item {
        position: relative;
    }

    .pill {
        position: absolute;
        background-color: rgba(0, 0, 0, 0.2);
        top: -40px;
        right: 10px;
        color: #ffffff;
        font-size: 16px;
        font-weight: 500;
        padding: 4px 8px;
        border-radius: 4px;
    }
</style>

<a href="{{route('ad.show', ['slug' => $ads->slug])}}" style="{{ !$isEdit ? 'cursor: pointer;' : ''}}; text-decoration: none" class="my-ad-item">
    @if(Auth::user()?-> id !== null && !empty($ads) && $ads->user_id == Auth::user()->id && isset($isEdit) && $isEdit === false)
        <div class="pill">Meu anúncio</div>
    @endif
    <div class="ad-image-area">
        <div class="ad-buttons">
            @if(Auth::check() && Auth::user()->id !== null && !empty($ads) && $ads->user_id == Auth::user()->id && isset($isEdit) && $isEdit == true)

                <a href="{{route('ad.delete', ['id' => $ads->id])}}" class="ad-button">
                    <img src="assets/icons/deleteIcon.png" />
                </a>
                <div class="ad-button">
                    <img src="assets/icons/editIcon.png" />
                </div>
            @endif
        </div>
        <div
        class="ad-image"
        style="background-image: url({{ $ads->images->first()->url ?? 'https://placehold.co/600x400'}})"
        ></div>
    </div>
        <div class="ad-title">{{$ads->title}}</div>
    <div class="ad-price">R$ {{number_format(num: $ads->price, decimals: 2, decimal_separator: ',', thousands_separator: '.')}}</div>
</a>