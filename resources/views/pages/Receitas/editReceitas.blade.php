@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Editar Receita')])

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
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-warning">
          <h4 class="card-title ">Receitas</h4>
        </div>
        <div class="card-body" style="height: 250px; overflow-y: scroll;">
          <form action="/AttRec/{{ json_decode($Receitas)->id_receita }}/attRec" method="post" class="form-horizontal">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-warning">
                  <th>Número Da Receita</th>
                  <th>Ingredientes</th>
                  <th>Tempo de Preparo</th>
                  <th>Modo de Preparo</th>
                  <th>Rendimento da Receita</th>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <input class="form-control" type="text" placeholder="{{ __('Id Receita') }}" value="{{ json_decode($Receitas)->id_receita }}" name="cat_nome" disabled/>
                    </td>
                    <td>
                      <input class="form-control" type="text" placeholder="{{ __('Ingredientes') }}" value="{{ json_decode($Receitas)->ingredientes }}" name="ingredientes" disabled/>
                    </td>
                    <td>
                      <input class="form-control" type="time" placeholder="{{ __('Tempo de Preparo') }}" value="{{ json_decode($Receitas)->temp_preparo }}" name="temp_preparo" required="true" aria-required="true"/>
                    </td>
                    <td>
                      <input class="form-control" type="text" placeholder="{{ __('Modo de Preparo') }}" value="{{ json_decode($Receitas)->modo_preparo }}" name="modo_preparo" required="true" aria-required="true"/>
                    </td>
                    <td>
                      <input class="form-control" type="text" placeholder="{{ __('Rendimento') }}" value="{{ json_decode($Receitas)->receita_rend }}" name="receita_rend" required="true" aria-required="true"/>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-success btn-block btn-sm">{{ __('Salvar') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
