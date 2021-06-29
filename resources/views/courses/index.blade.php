@extends("template.main")
@section('content')
  <div class="container">
    @include('errors.errors')
    <div class="row">
      <button onclick="location.href='{{url('/')}}/cursos/create';"
              class="btn btn-round btn-primary ">Novo Cadastro
      </button>
      <table class="table">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Imagem</th>
          <th scope="col">Conteudo programático</th>
          <th style="width: 20%">Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $val)
          <tr>
            <td>{{ $val->id }}</td>
            <td>{{ $val->name }}</td>
            <td>
              <img width="50" height="50" src="{{ url("arquivos/fotos/$val->file") }}" alt="">
            </td>
            <td>{{ $val->content_program }}</td>
            <td>
              <a style="float: left" href="{{route('cursos.edit',  $val->id ) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Editar </a>
              {!! Form::model($val->id , [ 'route' => ['cursos.destroy', $val->id] , 'method' => 'DELETE', 'id' => 'form-delete']) !!}
              <button style="float: left" data-placement="top" data-toggle="tooltip" data-original-title="Deletar"
                      class="btn btn-danger btn-sm deletar">
                <i class="fa fa-trash"></i> Deletar
              </button>
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      {{ $courses->appends(request()->except('page'))->links()}}
    </div>
  </div>
@stop
@section('styles')
@stop
@section('scripts')
  {!! Html::script('/js/default.js') !!}
@stop
