<div class="categories-area">
    <div class="title">Categorias</div>
        @if(count($categories) > 0)
            <div class="buttons">
                @forEach ($categories as $category)
                    <a style="text-decoration: none" href={{ route('ad.category', $category->slug)}} class="cars">
                        <img src="assets/icons/carIcon.png" alt="Ícone Carros" />
                        {{ $category->name }}
                    </a>
                @endforEach
            </div>
        @else
            <div class="no-ads">Nenhuma categoria cadastrada!</div>
        @endif
    </div>
</div>
