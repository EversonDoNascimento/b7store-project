 <main>
    <div class="newAd-page">
    <div class="newAd-title">Novo anúncio</div>
    <div class="newAd-areas">
        <div class="newAd-area-left">
        <div class="area-left-up">
            <div class="area-left-up-title">Imagens</div>
            <div class="area-left-up-img">
            <img src="{{ asset('assets/icons/imageIcon.png') }}" />
            <div class="area-left-up-img-text">
                <span>Clique aqui</span> para enviar uma imagem
            </div>
            </div>
        </div>
        <div class="area-left-bottom">
            <div class="smallpics">
            <img src="{{ asset('assets/icons/imageSmallIcon.png') }}" />
            </div>
            <div class="smallpics">
            <img src="{{ asset('assets/icons/imageSmallIcon.png') }}" />
            </div>
            <div class="smallpics">
            <img src="{{ asset('assets/icons/imageSmallIcon.png') }}" />
            </div>
            <div class="smallpics">
            <img src="{{ asset('assets/icons/imageSmallIcon.png') }}" />
            </div>
            <div class="smallpics">
            <img src="{{ asset('assets/icons/imageSmallIcon.png') }}" />
            </div>
        </div>
        </div>
        <div class="newAd-area-right">
        <form class="newAd-form">
            <div class="title-area">
            <div class="title-label">Título do anúncio</div>
            <input type="text" placeholder="Digite o título do anúncio" />
            </div>
            <div class="value-area">
            <div class="value-label">
                <div class="value-area-text">Valor</div>
                <input type="text" placeholder="Digite o valor" />
            </div>
            <div class="negotiable-area">
                <div class="negotiable-label">Negociável?</div>
                <select>
                <option selected>Não</option>
                <option>Sim</option>
                </select>
            </div>
            </div>
            <div class="newAd-categories-area">
            <div class="newAd-categories-label">Categorias</div>
            <select class="newAd-categories">
                <option selected hidden disabled value="">
                Selecione uma categoria
                </option>
                <option value="cars">Carros</option>
                <option value="eletronics">Eletrônicos</option>
                <option value="clothes">Roupas</option>
                <option value="sports">Esporte</option>
                <option value="babies">Bebês</option>
            </select>
            </div>
            <div class="description-area">
            <div class="description-label">Descrição</div>
            <textarea
                class="description-text"
                placeholder="Digite a descrição do anúncio"
            ></textarea>
            </div>
            <button class="newAd-button">Criar anúncio</button>
        </form>
        </div>
    </div>
    </div>
</main>