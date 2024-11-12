<div class="password-area">
    <div class="password-label">{{$label}}</div>
    <div class="password-input-area">
        <input id="{{$id}}" class="@error('{{$name}}') is_invalid @enderror"  name="{{$name}}" type="password" placeholder="{{$placeholder}}"  />
        <img src="assets/icons/eyeIcon.png" alt="Ícone mostrar/ocultar senha" onclick="toggleVisibitypass('{{$id}}')" />
    </div>
</div>

<script>
    if(typeof toggleVisibitypass !== 'function'){
        function toggleVisibitypass (id)  {
            const input =  document.getElementById(id);
            if(input.type === 'password'){
                    input.type = 'text';
            }else{
                    input.type = 'password'
            }
            }
    }
</script>