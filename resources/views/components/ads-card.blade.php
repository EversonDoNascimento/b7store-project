@if(Auth::check() && Auth::user()->id !== null && !empty($ads) && $ads->user_id == Auth::user()->id && isset($isEdit) && $isEdit == true)
    <div href="{{route('ad.show', ['slug' => $ads->slug])}}" style="{{ !$isEdit ? 'cursor: pointer; position: relative;' : ''}}; text-decoration: none" class="my-ad-item">         
            <div  class="ad-buttons">
                <div class="ad-button">
                    <a href="{{route('ad.delete', ['id' => $ads->id])}}" >
                        <img  src="{{ asset('assets/icons/deleteIcon.png') }}" />
                    </a>
                </div>
                <div class="ad-button">
                    <a href="{{route('ad.edit', ['id' => $ads->id])}}" >
                        <img style="max-width: 40px;" src="assets/icons/editIcon.png" />
                    </a>
                </div>
            </div>
        <div class="ad-image-area">
            <div
            class="ad-image"
            style="background-image: url({{ isset($ads->images->where('featured', '=', '1')->first()['url']) ? asset('/storage/' .$ads->images->where('featured', '=', '1')->first()['url']) : 'https://placehold.co/600x400'}})"
            ></div>
        </div>
        <div class="ad-title">{{$ads->title}}</div>
        <div class="ad-price">R$ {{number_format(num: $ads->price, decimals: 2, decimal_separator: ',', thousands_separator: '.')}}</div>
    </div>
@else
 
    <a href="{{route('ad.show', ['slug' => $ads->slug])}}" style="{{ !$isEdit ? 'cursor: pointer; position: relative;' : ''}}; text-decoration: none" class="my-ad-item">
        @if(Auth::user()?-> id !== null && !empty($ads) && $ads->user_id == Auth::user()->id && isset($isEdit) && $isEdit === false)
            <div class="pill">Meu anúncio</div>
        @endif
        <div class="ad-image-area">
            <div
            class="ad-image"
            style="background-image: url({{ isset($ads->images->where('featured', '=', '1')->first()['url']) ? asset('/storage/' .$ads->images->where('featured', '=', '1')->first()['url']) : 'https://placehold.co/600x400'}})"
            ></div>
        </div>
        <div class="ad-title">{{$ads->title}}</div>
        <div class="ad-price">R$ {{number_format(num: $ads->price, decimals: 2, decimal_separator: ',', thousands_separator: '.')}}</div>
    </a>
@endif