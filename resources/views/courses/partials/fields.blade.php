<div class="form-group">
  <label for="exampleFormControlInput1">Nome</label>
  {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  <label for="exampleFormControlTextarea1">Imagem</label>
  <input type="file" name="arquivo" class="form-control">
  @if(isset($course->id))
    <img width="50" height="50" src="{{ url("arquivos/fotos/$course->file") }}" alt="">
  @endif
</div>
<div class="form-group">
  <label for="exampleFormControlTextarea1">Conteúdo programático</label>
  {!! Form::textarea('content_program', null, ['class' => 'form-control', 'rows' => 5]) !!}
</div>
<div class="form-group">
  <input type="submit" class="btn btn-primary" value="Salvar">
</div>
