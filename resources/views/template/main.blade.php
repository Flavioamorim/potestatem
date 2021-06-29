<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  @include('template.head')
</head>
<body>

<div class="container-fluid">
  <div class="row min-vh-100 flex-column flex-md-row">
    <aside class="col-12 col-md-2 p-0 bg-dark flex-shrink-1">
      <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start py-2">
        <div class="collapse navbar-collapse ">
          <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
            <li class="nav-item">
              <a class="nav-link pl-0 text-nowrap" href="{{ url('cursos') }}"><i class="fa fa-bullseye fa-fw"></i> <span
                        class="font-weight-bold">Cursos</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-0 text-nowrap" href="{{ url('alunos') }}"><i class="fa fa-bullseye fa-fw"></i> <span
                        class="font-weight-bold">Alunos</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-0 text-nowrap" href="{{ url('relatorio') }}"><i class="fa fa-bullseye fa-fw"></i>
                <span
                        class="font-weight-bold">Relatório</span></a>
            </li>

          </ul>
        </div>
      </nav>
    </aside>
    <main class="col bg-faded py-3 flex-grow-1">
      @yield('content')
    </main>
  </div>
</div>

@include('template.footer')
</body>
</html>
