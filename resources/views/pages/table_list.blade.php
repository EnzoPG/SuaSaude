@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-warning">
            <h4 class="card-title ">Receitas</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-warning">
                  <th>Número Da Receita</th>
                  <th>Ingredientes</th>
                  <th>Modo de Preparo</th>
                  <th>Tempo de Preparo</th>
                  <th>Rendimento da Receita</th>
                </thead>
                <tbody>
                  @foreach(json_decode($Ingredientes) as $ing)
                  <tr>
                    <td>{{ $ing->id_receita }}</td>
                    <td>

                      {{ $ing->alim_nome }}

                    </td>
                    <td>{{ $ing->modo_preparo }}</td>
                    <td>{{ $ing->temp_preparo }}</td>
                    <td>{{ $ing->receita_rend }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-plain">
          <div class="card-header card-header-warning">
            <h4 class="card-title mt-0"> Combinações</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive" style="height:200px; overflow-y: scroll;">
              <table class="table">
                <thead class=" text-warning">
                  <th>Número Da Combinação</th>
                  <th>Ingredientes</th>
                  <th>Categoria da Combinação</th>
                </thead>
                <tbody>
                  @foreach (json_decode($Combinacoes) as $comb)
                  <tr>
                    <td>{{ $comb->id_combinacao }}</td>
                    <td>
                    @foreach(json_decode($Ingredientes) as $ing)
                      {{ $ing->alim_nome }} -
                    @endforeach
                    </td>
                    <td>{{ $comb->cat_comb }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-plain">
          <div class="card-header card-header-warning">
            <h4 class="card-title mt-0"> Categorias</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive" style="height:200px; overflow-y: scroll;">
              <table class="table">
                <thead class=" text-warning">
                  <th>Número Da Categoria</th>
                  <th>Categoria</th>
                </thead>
                <tbody>
                  @foreach (json_decode($Categorias) as $cats)
                  <tr>
                    <td>{{ $cats->cat_id }}</td>
                    <td>{{ $cats->cat_nome }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
