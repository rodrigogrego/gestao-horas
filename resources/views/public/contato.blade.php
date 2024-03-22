<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Contato</title>
        <meta charset="utf-8">

        <style>
            html, body {
                height: 100%;
                margin: 0;
                font-family: 'Roboto', sans-serif;
            }

            p, span {
                color: #ffffff;
            }

            h1 {
                color: #ffffff;
                font-size: 28px;
            }

            h2 {
                color: #333333;
                font-size: 22px;
            }

            input, select, textarea, button {
                width: 100%;
                padding: 10px 15px;
                margin: 10px 0px 10px 0px;
                box-sizing: border-box;
                border-radius: 3px;
                background-color: transparent;
                color: #333;
            }

            .texto-branco {
                color: #ffffff;
            }

            .borda-branca {
                border: solid 1px #fff;
            }

            .borda-preta {
                border: solid 1px #333;
            }

            button {
                background-color: #7ab829;
                cursor: pointer;
                color: #fff;
            }

            button:hover {
                background-color: #6ea22c;
            }

            ::placeholder {
                color: #333333;
                opacity: 1;
            }

            :-ms-input-placeholder {
                color: #333333;
            }

            ::-ms-input-placeholder {
                color: #333333;
            }

            .topo {
                width: 100%;
                background-color: #f8f8f8;
                position: absolute;
                padding: 20px 0px 10px 0px;
            }

            .logo img {
                width: 50px;
                float: left;
                margin-left: 40px;
            }

            .menu {
                float: right;
                margin-right: 40px;
            }

            .menu li {
                display: inline;
                float: left;
            }

            .menu ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
            }

            .menu a {
                text-decoration: none;
                padding: 14px 16px;
                color: #333;
            }

            .menu a:hover {
                color: #268fd0;
            }

            .conteudo-destaque {
                width: 100%;
                height: 100%;
                min-height: 800px; 
            }

            .esquerda {
                float:left;
                background-color: #268fd0;
                width: 60%;
                height: 100%;
            }

            .direita {
                float:right;
                background-color: #2a9ee2;
                width: 40%;
                height: 100%;
            }

            .informacoes, .contato {
                margin: 100px 40px 40px 40px;
            }

            .contato-principal {
                margin: 0px 60px 60px 40px;
            }

            .chamada {
                margin-top: 30px;
                margin-left: 20px;
            }

            .video {
                margin: 40px;
            }

            .video img {
                max-width: 100%;
                max-height: 100%;
            }

            .conteudo-pagina {
                width: 100%;
                height: 100%;
                text-align: center;
                margin-bottom: 100px;
            }

            .titulo-pagina {
                padding: 100px 0px 60px 0px;
                background-color: #2a9ee2;
                text-align: center;
            }

            .informacao-pagina {
                text-align: center;
                margin-top: 30px;
            }

            .informacao-pagina p{
                color: #333;
            }

            .rodape {
                width: 100%;
            }

            .redes-sociais, .area-contato, .localizacao {
                width: 33.333%;
                border-top:solid 1px #ccc;
                float: left;
                text-align: center;
                background-color: #f8f8f8;
                height: 250px;
            }

            .redes-sociais, .area-contato, .localizacao p, span {
                color: #333333;
            }

            .redes-sociais img {
                margin: 0px 15px 0px 15px;
            }

        </style>
    </head>

    <body>
        <div class="topo">

            <div class="logo">
                <img src="{{asset("/img/clock.png")}}">
            </div>

            <div class="menu">
                <ul>
                </ul>
            </div>
        </div>

        <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Entre em contato conosco</h1>
            </div>

            <div>
                <h3>{{$errors}}</h3>
            </div>
            <div class="informacao-pagina">
                <div class="contato-principal">
                    <form action="{{route('contato')}}" method=post>
                    @csrf
                        <input name="nome" type="text" value="{{ old('nome') }}" placeholder="Nome" class="borda-preta">
                        <br>
                        <input name="telefone" type="text" value="{{ old('telefone') }}" placeholder="Telefone" class="borda-preta">
                        <br>
                        <input name="email" type="text" value="{{ old('email') }}" placeholder="E-mail" class="borda-preta">
                        <br>
                        <select name="motivo_contato" class="borda-preta">

                        <option value="">Qual o motivo do contato?</option>
                        @foreach($motivo_contatos as $key => $motivo_contato)
                            <option value="{{$motivo_contato->id}}" {{old('motivo_contato') == $motivo_contato->id ? 'selected' : ''}}>{{ $motivo_contato->motivo_contato }}</option>
                        @endforeach
                        
                        </select>
                        <br>
                        <textarea name="mensagem" class="borda-preta" placeholder="Preencha aqui a sua mensagem">{{ (old('mensagem') !== '') ? old('mensagem') : 'Preencha aqui a mensagem!' }}</textarea>
                        <br>
                        <button type="submit" class="borda-preta">ENVIAR</button>
                    </form>
                </div>
            </div>  
        </div>

        <div class="rodape">
            <div class="redes-sociais">
                <h2>Redes sociais</h2>
            </div>
            <div class="area-contato">
                <h2>Contato</h2>
                <span>(00) 0000-0000</span>
                <br>
                <span>supergestatesteo@dominio.com.br</span>
            </div>
            <div class="localizacao">
                <h2>Localização</h2>
            </div>
        </div>
    </body>
</html>

