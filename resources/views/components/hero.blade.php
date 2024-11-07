<section class="hero-area">
    <h3 class="subtitle">Aqui você encontra o que tanto procura!</h3>
    <h1 class="title">O que você está procurando?</h1>
    <div class="search-area">
        <input
        class="search-text"
        type="text"
        placeholder="Estou procurando por..."
        />
        <select class="categories-options">
            <option selected hidden disabled value="">Categoria</option>

            @forEach($categories as $c)
                <option value="{{$c['value']}}">{{$c['category']}}</option>
            @endforEach
        </select>
        <select class="states">
            <option selected hidden disabled value="">Estado</option>
            @forEach($states as $state)
                <option value="{{$state['value']}}">{{$state['name']}}</option>
            @endforEach
        </select>
        <button class="search-button">Procurar</button>
    </div>
</section>