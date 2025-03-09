    <main>
      <div class="hero-area">
        <div class="search-area-adsList">
          <input
            class="search-text"
            type="text"
            placeholder="Estou procurando por..."
            wire:model.live.debounce.1000ms="search"
          />
          <p>{{$search}}</p>
          <div class="options-area">
            <div class="categories-area">
              <p>Categoria</p>
              <select wire:model.live="categorySelected" class="categories-options">
                <option selected hidden disabled value="">Todas</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
           
              </select>
            </div>
            <div class="states-area">
              <p>Estados</p>
              <select wire:model.live="stateSelected" class="states">
                <option selected hidden disabled value="">Todos</option>
                @foreach($states as $state)
                    <option value="{{$state->id}}">{{$state->name}}</option>
                @endforeach
              </select>
            </div>
            <button class="search-mobile-button">Procurar</button>
          </div>
        </div>
      </div>
      <div class="ads">
        <div class="ads-title">Anúncios recentes</div>
        <div class="ads-area">
            @if(count($ads) > 0)
            
              @foreach ($ads as $ad)
                <a href="{{route('ad.show', ['slug' => $ad['slug']])}}" text-decoration: none" class="my-ad-item">
                      <div class="ad-image-area">
                          <div
                          class="ad-image"
                          style="background-image: url({{ $ad->images->first()->url ?? 'https://placehold.co/600x400'}})"
                          ></div>
                      </div>
                          <div class="ad-title">{{$ad['title']}}</div>
                      <div class="ad-price">R$ {{number_format(num: $ad['price'], decimals: 2, decimal_separator: ',', thousands_separator: '.')}}</div>
                  </a>
              @endforeach
            @else
                <div class="no-ads">Nenhum anúncio relacionado</div>
            @endif
        </div>
      </div>
            <div class="mt-8 ">{{$ads->links()}}</div>
    </main>