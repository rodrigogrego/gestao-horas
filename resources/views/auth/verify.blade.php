@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verificação de e-mail</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           O e-mail de verificação foi encaminhado para sua caixa de e-mails.
                        </div>
                    @endif

                    Antes de acessar o sistema, por favor realize a validação do seu e-mail, por meio do link de verificação encaminhado para a sua caixa de e-mail.
                    Caso não tenha recebido o e-mail de verificiação, clique no link a seguir para receber um novo e-mail.
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Clique aqui</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
