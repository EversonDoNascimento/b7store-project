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
    <a href="{{route('login')}}" class="back-button">← Voltar</a>
    <div class="login-page">
      <div class="login-area">
        <h3 class="login-title">B7Store</h3>
        <div class="text-login">
          Preencha os campos abaixo e realize seu cadastro.
        </div>

        <form method="POST" action="{{route('auth.register_action')}}">
            @csrf
          <div class="name-area">
            <div class="name-label">Nome</div>
            <input class="@error('name') is_invalid @enderror" name="name" type="text" placeholder="Digite o seu nome" value="{{@old('name')}}"/>
          </div>
          @error("name")
            <div class="error">
              {{$message}}
            </div>
          @enderror
          <div class="email-area">
            <div class="email-label">E-mail</div>
            <input class="@error('email') is_invalid @enderror"  name="email" type="email" placeholder="Digite o seu e-mail" value="{{@old('email')}}" />
          </div>
          @error("email")
            <div class="error">
              {{$message}}
            </div>
          @enderror
          <x-form.inputpass name="password" placeholder="Digite sua senha" label="Senha:" id="password"></x-form.inputpass>
          @error("password")
            <div class="error">
              {{$message}}
            </div>
          @enderror
          <x-form.inputpass name="password_confirmation" placeholder="Confirme sua senha" label="Confirme a senha:" id="password_confirmation"></x-form.inputpass>
          @error("password_confirmation")
            <div class="error">
              {{$message}}
            </div>
          @enderror
          <button class="login-button">Cadastrar</button>
        </form>
        <div class="register-area">
          Já tem cadastro? <a href="{{route('login')}}">Fazer Login</a>
        </div>
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
