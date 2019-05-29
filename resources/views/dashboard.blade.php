@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

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
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-third card-header-icon">
            <div class="card-icon">
              <i class="material-icons">perm_identity</i>
            </div>
            <p class="card-category">Quantidade Total de Usuários</p>
            <h3 class="card-title">{{ json_decode($qtd_users) }}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons text-danger">warning</i>
              <a href="#pablo">Consiga mais Usuários...</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">fastfood</i>
            </div>
            <p class="card-category">Quantidade Total de Alimentos</p>
            <h3 class="card-title">{{ json_decode($qtd_alim) }}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">date_range</i> Última 24 Horas
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">info_outline</i>
            </div>
            <p class="card-category">Quantidade totais de Lembretes</p>
            <h3 class="card-title">{{ $qtd_lembretes }}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">local_offer</i> Atualizado agora a pouco
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="fa fa-twitter"></i>
            </div>
            <p class="card-category">Quantidade de Tags #SuaSaude</p>
            <h3 class="card-title">+245</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">update</i> Atualizado Agora
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card card-chart">
          <div class="card-header card-header-secondary">
            <h4 class="card-title">
              <p style="color: black;">Cadastrar Lembrete</p>
            </h4>
          </div>
          <div class="card-body">
            <h4 class="card-title">Insira aqui seus lembretes</h4>
            <p class="card-category">
              <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> dos usuários atingiram suas metas
            </p>
            <br />
            <form method="post" action="/CriaLembrete">
              @csrf
              <div class="form-group">
                <label for="tit_lemb">Título do Lembrete</label>
                <input type="text" class="form-control" id="tit_lemb" name="tit_lemb" placeholder="Título" required="true">
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
              <button class="btn btn-success btn-icon btn-block btn-sm">
                <i class="material-icons">check_circle</i>
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card card-chart">
          <div class="card-header card-header-primary">
            <h4 class="card-title">
              <p style="color: black;">Adicionar Usuário</p>
            </h4>
          </div>
          <div class="card-body ">
            <p class="card-category">
              <span class="text-success"><i class="fa fa-lock"></i></span> Cadastro Seguro e Garantido!
            </p>
            <div class="col-md-12 mb-2 text-right">
              <a href="{{ route('user.index') }}" class="btn btn-sm btn-info" title="Listagem dos Usuários">
                <i class="material-icons">list</i>
              </a>
            </div>
            <br />
            <form method="post" action="{{ route('user.store') }}" autocomplete="off" class="form-horizontal">
              @csrf
              @method('post')
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Nome') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nome') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
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
                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required />
                    @if ($errors->has('email'))
                    <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Senha') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="password" name="password" id="input-password" placeholder="{{ __('Senha') }}" value="" required />
                    @if ($errors->has('password'))
                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirmar Senha') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirmar Senha') }}" value="" required />
                  </div>
                </div>
              </div>
              <button class="btn btn-icon btn-block btn-sm" style="background: linear-gradient(to right, rgba(88,219,252,1) 0%, rgba(39,55,230,1) 100%);">
                <i class="material-icons">check_circle</i>
              </button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header card-header-tabs card-header-warning">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <span class="nav-tabs-title" style="color: black;">Informações:</span>
                <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="#messages" data-toggle="tab">
                      <i class="material-icons">fastfood</i> Alimentos
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#tipos_alimentos" data-toggle="tab">
                      <i class="material-icons">dialpad</i> Tipos
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#categorias" data-toggle="tab">
                      <i class="material-icons">category</i> Categorias
                      <div class="ripple-container"></div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="messages">
                <div style="height:200px; overflow-y: scroll;">
                  <table class="table">
                    <tbody>
                      @foreach (json_decode($Alimentos) as $ali)
                      <tr>
                        <td> {{ $ali->alim_nome }} </td>
                        <td class="td-actions text-right">
                          <a href="Edita_ali/{{ $ali->alim_id }}/editaAli">
                            <button type="button" rel="tooltip" title="Editar Alimento" class="btn btn-primary btn-link btn-sm">
                              <i class="material-icons">edit</i>
                            </button>
                          </a>
                          <a href="Deleta_ali/{{ $ali->alim_id }}/deleteAli">
                            <button type="button" rel="tooltip" title="Excluir este alimento" class="btn btn-danger btn-link btn-sm">
                              <i class="material-icons">close</i>
                            </button>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane" id="tipos_alimentos">
                <div style="height:200px; overflow-y: scroll;">
                  <table class="table">
                    <tbody>
                      @foreach (json_decode($TiposAlimentos) as $tipo_ali)
                      <tr>
                        <td> {{ $tipo_ali->tipo_nome }} </td>
                        <td class="td-actions text-right">
                          <a href="Edita_ali_type/{{ $tipo_ali->id_tipo }}/editaAliType">
                            <button type="button" rel="tooltip" title="Editar Alimento" class="btn btn-primary btn-link btn-sm">
                              <i class="material-icons">edit</i>
                            </button>
                          </a>
                          <a href="Deleta_Ali_Type/{{ $tipo_ali->id_tipo }}/deleteAliType">
                            <button type="button" rel="tooltip" title="Excluir tipo" class="btn btn-danger btn-link btn-sm">
                              <i class="material-icons">close</i>
                            </button>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane" id="categorias">
                <div style="height:200px; overflow-y: scroll;">
                  <table class="table">
                    <tbody>
                      @foreach (json_decode($Categorias) as $cats)
                      <tr>
                        <td> {{ $cats->cat_nome }} </td>
                        <td class="td-actions text-right">
                          <a href="Edita_cat/{{ $cats->cat_id }}/editaCat">
                            <button type="button" rel="tooltip" title="Editar Categoria" class="btn btn-primary btn-link btn-sm">
                              <i class="material-icons">edit</i>
                            </button>
                          </a>
                          <a href="Deleta_cat/{{ $cats->cat_id }}/deleteCat">
                            <button type="button" rel="tooltip" title="Excluir Categoria" class="btn btn-danger btn-link btn-sm">
                              <i class="material-icons">close</i>
                            </button>
                          </a>
                        </td>
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
      <div class="col-md-6">
        <div class="card">
          <div class="card-header card-header-forth">
            <h4 class="card-title">Usuários cadastrados no sistema</h4>
            <p class="card-category">Ano 2019</p>
          </div>
          <div class="card-body table-responsive" style="height:200px; overflow-y: scroll;">
            <table class="table table-hover">
              <thead class="text-primary">
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
              </thead>
              @foreach (json_decode($user) as $usu)
              <tbody>
                <tr>
                  <td>{{ $usu->id }}</td>
                  <td>{{ $usu->name }}</td>
                  <td>{{ $usu->email }}</td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

  @push('js')
  <script>
  $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    md.initDashboardPageCharts();
  });
  </script>
  @endpush
