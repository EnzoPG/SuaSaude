@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
<div class="content">
  <div class="container-fluid">
    @if (session('status'))
    <div class="row">
      <div class="col-sm-12">
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
          </button>
          <span>{{ session('status') }}</span>
        </div>
      </div>
    </div>
    @endif
    <div class="row">
      <div class="col-md-6">
        <form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
          @csrf
          @method('put')

          <div class="card ">
            <div class="card-header card-header-warning">
              <h4 class="card-title">{{ __('Editar Perfil') }}</h4>
              <p class="card-category">{{ __('Informação do usuário') }}</p>
            </div>
            <div class="card-body ">
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Nome') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nome') }}" value="{{ old('name', auth()->user()->name) }}" />
                    @if ($errors->has('name'))
                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" />
                    @if ($errors->has('email'))
                    <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-success">{{ __('Salvar') }}</button>
            </div>
          </div>
        </form>
      </div>
      <!-- <div class="col-md-6">
      <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
      @csrf
      @method('put')

      <div class="card ">
      <div class="card-header card-header-warning">
      <h4 class="card-title">{{ __('Trocar Senha') }}</h4>
      <p class="card-category">{{ __('Senha') }}</p>
    </div>
    <div class="card-body ">
    @if (session('status_password'))
    <div class="row">
    <div class="col-sm-12">
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <i class="material-icons">close</i>
  </button>
  <span>{{ session('status_password') }}</span>
</div>
</div>
</div>
@endif
<div class="row">
<label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Senha Atual') }}</label>
<div class="col-sm-7">
<div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
<input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Senha Atual') }}" value="" required />
@if ($errors->has('old_password'))
<span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
@endif
</div>
</div>
</div>
<div class="row">
<label class="col-sm-2 col-form-label" for="input-password">{{ __('Nova Senha') }}</label>
<div class="col-sm-7">
<div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
<input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('Nova Senha') }}" value="" required />
@if ($errors->has('password'))
<span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
@endif
</div>
</div>
</div>
<div class="row">
<label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirme a nova Senha') }}</label>
<div class="col-sm-7">
<div class="form-group">
<input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirme a nova Senha') }}" value="" required />
</div>
</div>
</div>
</div>
<div class="card-footer ml-auto mr-auto">
<button type="submit" class="btn btn-success">{{ __('Atualizar Senha') }}</button>
</div>
</div>
</form>
</div> -->
<div class="col-md-6">
  <form method="post" action="update_data/{{ auth()->user()->id }}/updateData" class="form-horizontal">
    @csrf
    <div class="card " style="height: 270px;">
      <div class="card-header card-header-warning">
        <h4 class="card-title">Índice de Massa Corpórea</h4>
      </div>
      <div class="card-body ">
        <div class="row">
          <label class="col-sm-2 col-form-label" for="input-password">{{ __('Altura') }}</label>
          <div class="col-sm-7">
            <div class="form-group">
              <input class="form-control" name="altura" id="input-password" type="text" placeholder="{{ __('Altura') }}" value="{{ $User_alt }}" required />
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Peso') }}</label>
          <div class="col-sm-7">
            <div class="form-group">
              <input class="form-control" input type="text" name="peso" id="input-current-password" placeholder="{{ __('Peso Atual') }}" value="{{ $User_peso }}" required />
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('IMC') }}</label>
          <div class="col-sm-7">
            <div class="form-group">
              <input class="form-control" type="text" name="peso" id="input-current-password" value="{{ $User_imc }}" disabled />
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ml-auto mr-auto">
        <button type="submit" class="btn btn-success">{{ __('Atualizar') }}</button>
      </div>
    </div>
  </form>
</div>
<div class="col-md-6" style="height: 250px; overflow-y: scroll">
  <label> Tabela - Masculino </label>
  <table class="table">
    <thead>
      <tr>
        <th>Idade</th>
        <th>Tipo</th>
        <th>Gordura Corporal</th>
      </tr>
    </thead>
    <tbody>
      @foreach( $json_arc as $gc )
        @if($gc['sexo'] == 'Masculino')
        <tr>
          <td>{{ $gc['idade'] }}</td>
          <td>{{ $gc['tipo'] }}</td>
          <td>{{ $gc['gordura_corporal'] }}</td>
        </tr>
        @endif
      @endforeach
    </tbody>
  </table>
</div>
<div class="col-md-6" style="height: 250px; overflow-y: scroll">
  <label> Tabela - Feminino </label>
  <table class="table">
    <thead>
      <tr>
        <th>Idade</th>
        <th>Tipo</th>
        <th>Gordura Corporal</th>
      </tr>
    </thead>
    <tbody>
      @foreach( $json_arc as $gc )
        @if($gc['sexo'] == 'Feminino')
        <tr>
          <td>{{ $gc['idade'] }}</td>
          <td>{{ $gc['tipo'] }}</td>
          <td>{{ $gc['gordura_corporal'] }}</td>
        </tr>
        @endif
      @endforeach
    </tbody>
  </table>
</div>
</div>
</div>
@endsection
