@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Editar Alimento')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header card-header-primary">
            <h4 class="card-title">{{ __('Editar Alimento') }}</h4>
            <p class="card-category"></p>
          </div>
          <div class="card-body ">
            <form action="/AttAli/{{ $Alimentos->alim_id }}/attAli" method="post" class="form-horizontal">
              @csrf
              <input class="form-control" type="text" placeholder="{{ __('Nome') }}" value="{{ $Alimentos->alim_nome }}" name="alim_nome" required="true" aria-required="true"/>
              <select class="form-control" data-style="btn btn-link" name="alim_tipo">
                @foreach ($TiposAlimentos as $ali_tip)
                <option value="{{ $ali_tip->id_tipo }}">{{ $ali_tip->tipo_nome }}</option>
                @endforeach
              </select>
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
