<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('assets/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/myAccountStyle.css')}}" />

    <title>B7Store - Minha Conta</title>
  </head>

  <body>
    <x-base.header></x-base.header>
    <main>
   
      <div class="my-account-page">
            @if (session()->has('success'))
              <div class="alert success">
                <p>{{session()->get('success')}}</p>
              </div>
            @endif
        <div class="sidebar">
          <div class="sidebar-top">
            <a href="/myAccount.html" class="config"
              ><img src="assets/icons/configIcon.png" /> Configurações</a
            >
            <a href="/myAds.html"
              ><img src="assets/icons/layersIonGray.png" /> Meus Anúncios</a
            >
          </div>
          <div class="sidebar-bottom">
            <a href="/index.html"
              ><img src="assets/icons/logoutIcon.png" /> Sair</a
            >
          </div>
        </div>
        <div class="profile-area">
          <h3 class="profile-title">Meu perfil</h3>
          <form action="{{route('dashboard.my_account_action')}}" method="POST">
            @csrf
            <div class="name-area">
              <div class="name-label">Nome</div>
              <input
                name="name"
                type="text"
                placeholder="Digite o seu nome"
                value="{{$user->name}}"
              />
                @error("name")
                <div class="error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="email-area">
              <div class="email-label">E-mail</div>
              <input
              name="email"
                type="email"
                placeholder="Digite o seu e-mail"
                value="{{$user->email}}"
              />
                @error("email")
                <div class="error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="password-area">
              <div class="password-label">Senha</div>
              <div class="password-input-area">
                <input
                  type="password"
                  placeholder="Digite a sua senha"
                  value="123456789"
                />
                <img src="assets/icons/eyeIcon.png" />
              </div>
            </div>
            <div class="state-area">
              <div class="state-label">Estado</div>
              <select name="state" class="states">
                @foreach($states as $state)
                  <option {{$state->id == $user->state_id ? "selected" : ""}} value="{{$state->id}}">{{$state->name}}</option>
                @endforeach
              </select>
                 @error("state")
                <div class="error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button class="save-button">Salvar</button>
          </form>
        </div>
      </div>
    </main>
    <x-base.footer></x-base.footer>
  </body>
</html>
