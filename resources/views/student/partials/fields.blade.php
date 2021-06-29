<div class="form-group">
  <label for="exampleFormControlInput1">Nome</label>
  {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  <label for="exampleFormControlInput1">E-mail</label>
  {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  <label for="exampleFormControlInput1">CPF</label>
  {!! Form::text('cpf', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {{ Form::select('courses[]', $courses, $coursesSelect ?? null , ['multiple'=>'multiple', 'class' => 'form-control js-example-basic-multiple']) }}
</div>

<div class="form-group">
  <input type="submit" class="btn btn-primary" value="Salvar">
</div>
