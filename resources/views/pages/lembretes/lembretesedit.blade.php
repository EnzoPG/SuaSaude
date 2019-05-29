@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Editar Alimento')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header card-header-primary">
            <h4 class="card-title">{{ __('Editar Lembrete') }}</h4>
            <p class="card-category"></p>
          </div>
          <div class="card-body ">
            <form action="" method="post" class="form-horizontal">
              <div class="form-group">
                <label for="tit_lemb">Título do Lembrete</label>
                <input type="text" class="form-control" id="tit_lemb" name="tit_lemb" value="{{ $Lembrete->tit_lemb }}" placeholder="Título" required="true">
                <small id="tit_lemb" class="form-text text-muted">Todos os lembretes poderão ser visualizados em <a href="/Lembretes">"Lembretes"</a></small>
              </div>
              <div class="form-group">
                <label for="desc_lemb">Descrição do Lembrete</label>
                <textarea class="form-control" id="desc_lemb" name="desc_lemb" rows="2" required="true"></textarea>
              </div>
              <div class="form-group">
                <label for="data_lemb">Data para o Lembrete</label>
                <input type="date" class="form-control" id="data_lemb" name="data_lemb" required="true" />
              </div>
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
