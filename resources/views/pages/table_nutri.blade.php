@extends('layouts.app', ['activePage' => 'tabela_nutri', 'titlePage' => __('Tabela Nutricional dos Alimentos')])

@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Informações Nutricionais</h4>
          <input type="text" name="searchbox" id="searchbox" class="filterinput form-control" placeholder="Pesquisar...">
        </div>
        <div class="card-body table-responsive">
          <div class="row">
            @foreach ($json_arc as $alimentos)
            <div class="col-md-4" data-role="alimentos">
              <div class="card" style="background-color: #191919;">
                <div class="card-header card-header-info">
                  <h4 class="card-title" style="color: black;">{{ $alimentos['nome'] }}</h4>
                </div>
                <div class="card-body table-responsive">
                  <div class="row">
                    <div class="col-md-6">
                      <p style="color: white;">
                        Grupo: {{ $alimentos['grupo'] }}
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p style="color: white;">
                        KCal: {{ $alimentos['energiakcal'] }}
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p style="color: white;">
                        KJ: {{ $alimentos['energiakj'] }}
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p style="color: white;">
                        Proteínas: {{ $alimentos['proteina'] }}
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p style="color: white;">
                        Colesterol: {{ $alimentos['colesterol'] }}
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p style="color: white;">
                        Carboidratos: {{ $alimentos['carboidrato'] }}
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p style="color: white;">
                        Fibra Alimentar: {{ $alimentos['fibraalimentar'] }}
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p style="color: white;">
                        Cálcio: {{ $alimentos['calcio'] }}
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p style="color: white;">
                        Magnésio: {{ $alimentos['magnesio'] }}
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p style="color: white;">
                        Manganês: {{ $alimentos['manganes'] }}
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p style="color: white;">
                        Fósforo: {{ $alimentos['fosforo'] }}
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p style="color: white;">
                        Ferro: {{ $alimentos['ferro'] }}
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p style="color: white;">
                        Sódio: {{ $alimentos['sodio'] }}
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p style="color: white;">
                        Potássio: {{ $alimentos['potassio'] }}
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p style="color: white;">
                        Cobre: {{ $alimentos['cobre'] }}
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p style="color: white;">
                        Zinco: {{ $alimentos['zinco'] }}
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p style="color: white;">
                        Vitamina C: {{ $alimentos['vitaminac'] }}
                      </p>
                    </div>
                  </div>
                </div>
                <!-- <button class="btn btn-success btn-icon btn-sm">
                <i class="material-icons">check_circle</i>
              </button> -->
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection

@push('js')
<script>
$(document).ready(function() {
  $("#searchbox").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $('div[data-role="alimentos"]').filter(function() {
      $(this).toggle($(this).find('h4').text().toLowerCase().indexOf(value) > -1);
    });
  });
});
</script>
@endpush
