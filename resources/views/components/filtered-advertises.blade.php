
<div class="ads">
    <div class="ads-title">Anúncios recentes</div>
    <div class="ads-area">
        @if(count($products) > 0)
            @forEach($products as $product)
                <x-ads-card :ads="$product" :isEdit="false"></x-ads-card>
            @endforEach
        @else
            <div>
                Não há anúncios recentes para exibir
            </div>
        @endif
    </div>
</div>