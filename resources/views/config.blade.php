@extends('layouts.app')

@section('content')

    <style>

        .form-signin {
            text-align: center;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            text-align: center;
        }
    </style>
    <div class="row">
        <h4 class="d-flex justify-content-between align-items-center mb-3 col-md-12">
            <span class="text-muted">Api-Console Application config</span>
        </h4>
        <div class="col-md-6">
            Необходимо создать приложение типа "Self Client application" в zoho Api-Console<br>
            После чего, заполнить форму, данными получеными из приложения
            <h1 class="h3 mb-3 font-weight-normal"></h1>
        </div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form class="form-signin col-md-6" action="{{ route('zoho_config') }}" method="post">
            @csrf


            @if(session('configuration'))
                <label for="inputEmail" class="sr-only">Client id</label>
                <input type="text" name="client_id" value="{{ session('configuration')['client_id'] }}" id="inputEmail"
                       class="form-control" required="" autofocus="">
                <label for="inputPassword" class="sr-only">Client Secret</label>
                <input type="text" name="client_secret" value="{{ session('configuration')['client_secret'] }}"
                       id="inputPassword" class="form-control" required="">
                <label for="inputPassword" class="sr-only">Email учетной записи в zoho</label>
                <input type="email" name="user_email_id" value="{{ session('configuration')['currentUserEmail'] }}"
                       id="inputPassword" class="form-control" required="">


                <label for="inputPassword" class="sr-only">redirect_uri</label>
                <input type="text" name="redirect_uri" value="{{ session('configuration')['redirect_uri'] }}" id="inputPassword" class="form-control"
                       placeholder="http://localhost:8000" required="">
                <label for="inputPassword" class="sr-only">apiBaseUrl</label>
                <input type="text" name="apiBaseUrl" value="{{ session('configuration')['apiBaseUrl'] }}" id="inputPassword" class="form-control"
                       placeholder="www.zohoapis.eu" required="">
                <label for="inputPassword" class="sr-only">accounts_url</label>
                <input type="text" name="accounts_url" value="{{ session('configuration')['accounts_url'] }}" id="inputPassword" class="form-control"
                       placeholder="https://accounts.zoho.eu" required="">


            @else
                <label for="inputEmail" class="sr-only">Client id</label>
                <input type="text" name="client_id" id="inputEmail" class="form-control" placeholder="Client id"
                       required="" autofocus="">
                <label for="inputPassword" class="sr-only">Client Secret</label>
                <input type="text" name="client_secret" id="inputPassword" class="form-control"
                       placeholder="Client Secret" required="">
                <label for="inputPassword" class="sr-only">Email учетной записи в zoho</label>
                <input type="email" name="user_email_id" id="inputPassword" class="form-control"
                       placeholder="Email учетной записи в zoho" required="">


                <label for="inputPassword" class="sr-only">redirect_uri</label>
                <input type="text" name="redirect_uri" id="inputPassword" class="form-control"
                       placeholder="http://localhost:8000" required="">
                <label for="inputPassword" class="sr-only">apiBaseUrl</label>
                <input type="text" name="apiBaseUrl" id="inputPassword" class="form-control"
                       placeholder="www.zohoapis.eu" required="">
                <label for="inputPassword" class="sr-only">accounts_url</label>
                <input type="text" name="accounts_url" id="inputPassword" class="form-control"
                       placeholder="https://accounts.zoho.eu" required="">

            @endif
            <div class="checkbox mb-3">
                <label>
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
        </form>
    </div>
@endsection

