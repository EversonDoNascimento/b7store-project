<section class="hero-area">
    <h3 class="subtitle">Aqui você encontra o que tanto procura!</h3>
    <h1 class="title">O que você está procurando?</h1>
    <form style="width: 100%;" method="GET" action="{{route('ad.list')}}">
        <div class="search-area">
            <input
            class="search-text"
            type="text"
            name="s"
            placeholder="Estou procurando por..."
            />
            <select name="c" class="categories-options">
                <option selected hidden disabled value="">Categoria</option>

                @forEach($categories as $c)
                    <option value="{{$c['id']}}">{{$c['name']}}</option>
                @endforEach
            </select>
            <select name="st" class="states">
                <option selected hidden disabled value="">Estado</option>
                @forEach($states as $state)
                    <option value="{{$state['id']}}">{{$state['name']}}</option>
                @endforEach
            </select>
            <button class="search-button" type="submit">Procurar</button>
        </div>
    </form>

</section>