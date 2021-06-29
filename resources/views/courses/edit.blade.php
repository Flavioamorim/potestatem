@extends("template.main")
@section('content')
  <div class="container">
    {!! Form::model($course , [ 'route' => ['cursos.update', $course->id] , 'enctype' => 'multipart/form-data', 'method'=>'PUT']) !!}
      @include('courses.partials.fields')
    {!! Form::close() !!}
  </div>
@stop
@section('styles')
@stop
@section('scripts')
@stop
