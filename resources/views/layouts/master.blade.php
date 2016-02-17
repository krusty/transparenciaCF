<html>
    <head>
        <title>Portal de Transparencia. Ciudad Futura - @yield('title')</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://code.jquery.com/jquery-2.2.0.min.js" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="">
                 <h1>CIUDAD FUTURA <small>Portal de transparencia</small></h1>
            </div>
            <div class="panel panel-success">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Cómo funciona?
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="{{ $tab == 'inicio' ? 'active' : ''}}"><a href="/" aria-controls="Inicio" role="tab">Inicio</a></li>
              <li role="presentation" class="{{ $tab == 'consejo' ? 'active' : ''}}"><a href="/consejo" aria-controls="Consejo" role="tab">Consejo</a></li>
              <li role="presentation" class="{{ $tab == 'ingresos' ? 'active' : ''}}"><a href="/ingresos" aria-controls="Ingresos" role="tab">Ingresos</a></li>
              <li role="presentation" class="{{ $tab == 'gastos' ? 'active' : ''}}"><a href="/gastos" aria-controls="Gastos" role="tab">Gastos</a></li>
            </ul>
            @yield('content')
        </div>
    </body>
</html>
