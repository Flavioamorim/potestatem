@extends("template.main")
@section('content')
  <div class="container">
    @include('errors.errors')
    <div class="row">
      <table class="table">
        <thead>
        <tr>
          <th scope="col">Curso</th>
          <th scope="col">Quantidade matrículas</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $val)
          <tr>
            <td>{{ $val->name }}</td>
            <td>{{ $val->mat }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@stop
@section('styles')
@stop
@section('scripts')
  {!! Html::script('/js/default.js') !!}
@stop
