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
        <form wire:submit="save" class="newAd-form">
            <div class="title-area">
            <div class="title-label">Título do anúncio</div>
                <div style="margin-bottom: 20px;">
                    <input style="margin-bottom: 0;" type="text" wire:model="title" placeholder="Digite o título do anúncio" />
                    @error('title') <span class="errorMessage">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="value-area">
            <div class="value-label">
                <div class="value-area-text">Valor</div>
                <div>
                    <input type="text" wire:model="value" placeholder="Digite o valor" />
                    @error('value') <span class="errorMessage">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="negotiable-area">
                <div class="negotiable-label">Negociável?</div>
                <div>
                    <select wire:model="negotiable">
                        <option selected>Não</option>
                        <option>Sim</option>
                    </select>
                    @error('negotiable') <span style="width: 100%; text-wrap: nowrap;" class="errorMessage">{{ $message }}</span> @enderror
                </div>

            </div>
            </div>
            <div class="newAd-categories-area">
            <div class="newAd-categories-label">Categorias</div>
                <div style="margin-bottom: 20px;">
                    <select  style="margin-bottom: 0;" wire:model="category" class="newAd-categories">
                        <option selected hidden disabled value="">Selecione uma categoria</option>
                        @forEach($loadedCategories as $category)
                            <option value="{{ $category->id }}">{{$category->name}}</option>
                        @endForEach
                    </select>
                   @error('category') <span class="errorMessage">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="description-area">
            <div class="description-label">Descrição</div>
                <div style="margin-bottom: 40px;">
                    <textarea
                       style="margin-bottom: 0;"
                        wire:model="description"
                        class="description-text"
                        placeholder="Digite a descrição do anúncio"
                    ></textarea>
                  @error('description') <span class="errorMessage">{{ $message }}</span> @enderror
                </div>
            </div>
            <button class="newAd-button" type="submit">Criar anúncio</button>
        </form>
        </div>
    </div>
    </div>
</main>