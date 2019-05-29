<div class="sidebar" data-color="white" data-background-color="black">

  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Sua Saúde') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>Menu</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i class="material-icons">person</i>
          <p>{{ __('Seu Perfil') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse hide" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-normal">{{ __('Alterar seus Dados') }} </span>
              </a>
            </li>
            <!-- <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-normal"> {{ __('Todos os usuários') }} </span>
              </a>
            </li> -->
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="/table_list">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Receitas e Combinações') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'lembretes' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('lembretes') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Lembretes') }}</p>
        </a>
      </li>
      <!-- <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li> -->
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Mapa') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="/cadastro_alimento">
          <i class="material-icons">add user</i>
          <p>{{ __('Cadastros') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'table_nutri' ? ' active' : '' }}">
        <a class="nav-link" href="/table_nutri">
          <i class="material-icons">assignment_late</i>
          <p>{{ __('Informações Nutricionais') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
