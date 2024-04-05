<div style="width:100%; height:100%; display:flex; align-items:center;  justify-content:center;">
    <div style="display:flex; flex-direction:column; align-items:center">
        <h1>GESTÃO DE HORAS</h1>

    
        <form action="{{ route('auth') }}" method="post"> 
            @csrf
            <div style="display:flex; flex-direction:column">

                <label for="">Login</label>

                <input type="text" id="login" name="login" value="{{old('login')}}">
                {{$errors->has('login') ? $errors->first('login') : ''}}
                
                <label for="pasword">Senha</label>
              
                <input type="password" name="password" id="password" value="{{old('password')}}">
                {{$errors->has('password') ? $errors->first('password') : ''}}

                <br>
                <input type="submit" value="Enviar">

                {{isset($erro) && $erro != '' ? $erro : ''}}
            </div>
        </form> 
   



    </div>
</div>