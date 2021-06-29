@extends("template.main")
@section('content')
  <div class="container">
    @include('errors.errors')
    <div class="row">
      <button onclick="location.href='{{url('/')}}/alunos/create';"
              class="btn btn-round btn-primary ">Novo Cadastro
      </button>
      <table class="table">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">Cpf</th>
          <th style="width: 20%">Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $val)
          <tr>
            <td>{{ $val->id }}</td>
            <td>{{ $val->name }}</td>
            <td>{{ $val->email }}</td>
            <td>{{ $val->cpf }}</td>
            <td>
              <a style="float: left" href="{{route('alunos.edit',  $val->id ) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Editar </a>
              {!! Form::model($val->id , [ 'route' => ['alunos.destroy', $val->id] , 'method' => 'DELETE', 'id' => 'form-delete']) !!}
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
      {{ $data->appends(request()->except('page'))->links()}}
    </div>
  </div>
@stop
@section('styles')
@stop
@section('scripts')
  {!! Html::script('/js/default.js') !!}
@stop
