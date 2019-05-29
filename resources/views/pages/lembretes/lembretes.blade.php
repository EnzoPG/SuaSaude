@extends('layouts.app', ['activePage' => 'lembretes', 'titlePage' => __('Lembretes')])

@section('content')

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css"/>
  <script type="text/javascript" src="/js/pt-br.js"></script>

  {!! $calendar->script() !!}
</head>

<body>

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

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header" style="background: linear-gradient(to right, rgba(9,237,62,1) 0%, rgba(24,240,229,1) 100%);">
              <h4 class="card-title">Lembretes</h4>
            </div>
            <div class="card-body" id="calendar">
              {!! $calendar->calendar() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
@endsection

@push('js')
<script>
$(document).ready(function(){

})
</script>
@endpush
