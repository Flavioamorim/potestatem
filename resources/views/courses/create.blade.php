@extends("template.main")
@section('content')
  <div class="container">
    {!! Form::open([ 'route' => 'cursos.store', 'enctype' => 'multipart/form-data', 'method'=>'POST']) !!}
    @include('courses.partials.fields')
    {!! Form::close() !!}
  </div>
@stop
@section('styles')
@stop
@section('scripts')
@stop
