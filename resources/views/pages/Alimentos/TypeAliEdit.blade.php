@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Editar Alimento')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header card-header-primary">
            <h4 class="card-title">{{ __('Editar Tipo do Alimento') }}</h4>
            <p class="card-category"></p>
          </div>
          <div class="card-body ">
            <form action="/AttAliType/{{ $TiposAlimentos->id_tipo }}/attAliType" method="post" class="form-horizontal">
              @csrf
              <input class="form-control" type="text" placeholder="{{ __('Nome') }}" value="{{ $TiposAlimentos->tipo_nome }}" name="tipo_nome" required="true" aria-required="true"/>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-success">{{ __('Salvar') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
