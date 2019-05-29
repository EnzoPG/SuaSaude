  @extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Editar Categoria')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header card-header-primary">
            <h4 class="card-title">{{ __('Editar Categoria') }}</h4>
            <p class="card-category"></p>
          </div>
          <div class="card-body ">
            <form action="/AttCat/{{ $Categoria->cat_id }}/attCat" method="post" class="form-horizontal">
              @csrf
              <input class="form-control" type="text" placeholder="{{ __('Nome') }}" value="{{ $Categoria->cat_nome }}" name="cat_nome" required="true" aria-required="true"/>
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
