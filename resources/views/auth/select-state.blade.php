<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="assets/loginSignUpStyle.css" />

    <title>B7Store - Cadastre-se</title>
  </head>

  <body>
    <a href="{{route('auth.login')}}" class="back-button">← Voltar</a>
    <div class="login-page">
      <div class="login-area">
        <h3 class="login-title">B7Store</h3>
        <div class="text-login">
          Preencha os campos abaixo e realize seu cadastro.
        </div>

        <form method="POST" action="{{route('state.state_action')}}">
            @csrf
          <div class="name-area">
            <div class="name-label">Selecione o Estado</div>
            
            <select class="states" name="state" id="">
                <option value="" selected disabled>Selecione um Estado</option>
                @forEach($states as $state)
                  <option value="{{$state['name']}}">{{$state['name']}}</option>
                @endforeach
              </select>
          </div>
          @error("state")
            <div class="error">
              {{$message}}
            </div>
          @enderror

          <button class="login-button">Selecionar</button>
        </form>
      </div>
      <div class="terms">
        Ao continuar, você concorda com os <a href="">Termos de Uso</a> e a
        <a href="">Política de Privacidade</a>, e também, em receber
        comunicações via e-mail e push de todos os nossos parceiros.
      </div>
    </div>
    <x-base.footer></x-base.footer>
  </body>
</html>
