@extends("template.main")
@section('content')
  <div class="container">
    {!! Form::model($data , [ 'route' => ['alunos.update', $data->id] , 'enctype' => 'multipart/form-data', 'method'=>'PUT']) !!}
      @include('student.partials.fields')
    {!! Form::close() !!}
  </div>
@stop
@section('styles')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop
@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.js-example-basic-multiple').select2();
    });
  </script>
@stop
