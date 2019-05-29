@extends('layouts.app', ['activePage' => 'language', 'titlePage' => __('Cadastro de Alimentos')])

@section('content')
<head>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<div class="content">
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
  <div class="col-12 col-md-6">
  <div class="card">
    <div class="card-header card-header-forth">
      <h4 class="card-title">Cadastro de Alimentos</h4>
    </div>
    <div class="card-body table-responsive">
      <form method="post" action="/Cadastrar_alimento">
        @csrf
        <div class="form-group">
          <label for="alim_nome">Nome do Alimento</label>
          <input type="text" class="form-control" id="alim_nome" name="alim_nome" placeholder="Nome" required>
        </div>
        <div class="form-group">
          <label for="alim_tipo">Tipo do Alimento</label>
          <select class="form-control" data-style="btn btn-link" id="alim_tipo" name="alim_tipo">
            @foreach (json_decode($TiposAlimentos) as $ali_tip)
            <option value="{{ $ali_tip->id_tipo }}">{{ $ali_tip->tipo_nome }}</option>
            @endforeach
          </select>
        </div>
        <button class="btn btn-success btn-just-icon">
          <i class="material-icons">check_circle</i>
        </button>
      </form>
    </div>
  </div>
</div>
<div class="col-6 col-md-6">
  <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title">Cadastro de Tipo de Alimentos</h4>
    </div>
    <div class="card-body table-responsive">
      <form method="post" action="/Cadastrar_Type_Alimento">
      @csrf
        <div class="form-group">
          <label for="exampleFormControlSelect1">Tipo do Alimento</label>
          <input type="text" class="form-control" id="tipo_nome" name="tipo_nome" placeholder="Tipo" required>
        </div>
        <button class="btn btn-success btn-just-icon">
          <i class="material-icons">check_circle</i>
        </button>
      </form>
    </div>
  </div>
</div>
<div class="col-lg-6 col-md-6">
  <div class="card">
    <div class="card-header card-header-secondary">
      <h4 class="card-title">Cadastro de Receitas</h4>
    </div>
    <div class="card-body table-responsive">
      <form method="post" action="/Cadastrar_receita">
      @csrf
        <div class="form-group">
          <label for="ingredientes">Ingredientes</label>
          <select multiple class="form-control selecpicker" data-style="btn btn-link" id="ingredientes" name="ingredientes[]">
            @foreach (json_decode($Alimentos) as $ing)
            <option value="{{ $ing->alim_id }}">{{ $ing->alim_nome }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="modo_preparo">Modo de Preparo</label>
          <textarea class="form-control" id="modo_preparo" name="modo_preparo" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="temp_preparo">Tempo de Preparo</label>
          <input type="time" class="form-control" id="temp_preparo" name="temp_preparo" required/>
        </div>
        <div class="form-group">
          <label for="receita_rend">Rendimento</label>
          <input type="text" class="form-control" id="receita_rend" name="receita_rend" placeholder="Exemplo: 3 pessoas" required/>
        </div>
        <button class="btn btn-success btn-just-icon">
          <i class="material-icons">check_circle</i>
        </button>
      </form>
    </div>
  </div>
</div>
<div class="col-lg-6 col-md-8">
  <div class="card">
    <div class="card-header card-header-warning">
      <h4 class="card-title">Cadastro de Combinações</h4>
    </div>
    <div class="card-body table-responsive">
      <form method="post" action="/Cadastrar_combin">
      @csrf
      <div class="form-group">
        <label for="ingredientes">Ingredientes</label>
        <select multiple class="form-control selecpicker" data-style="btn btn-link" id="ingredientes" name="ingredientes[]">
          @foreach (json_decode($Alimentos) as $ing)
          <option value="{{ $ing->alim_id }}">{{ $ing->alim_nome }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="cat_comb">Categorias</label>
        <select multiple class="form-control selecpicker" data-style="btn btn-link" id="cat_comb" name="cat_comb">
          @foreach (json_decode($Categorias) as $cat)
          <option value="{{ $cat->cat_id }}">{{ $cat->cat_nome }}</option>
          @endforeach
        </select>
      </div>
        <button class="btn btn-success btn-just-icon">
          <i class="material-icons">check_circle</i>
        </button>
      </form>
    </div>
  </div>
</div>
</div>
</div>
@endsection

@push('js')
<script>
</script>
@endpush
