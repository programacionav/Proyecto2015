<nav class="navbar navbar-default"> <!--navbar navbdefaultar- ¬ navbar navbar-inverse-->
  <div class="container">
      <ul class="nav navbar-nav">
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Especializades<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><?= Html::a("Visualizar", ["especialidades/index"]);?></li>
                <li><?= Html::a("Agregar", ["especialidades/create"]);?></li>
            </ul>
        </li>
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Empleados<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><?= Html::a("Agregar Empleado", ["empleados/create"]);?></li>
                <li><?= Html::a("Doctores", ["doctores/index"]);?></li>
                <li><?= Html::a("Enfermeros", ["enfermeros/index"]);?></li>
            </ul>
        </li>
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Licencias<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#licencias">Visualizar Licenciados</a></li>
                <li><a href="#licPendientes">Pendientes</a></li>
                <li><a href="#licHistorial">Historial</a></li>
                <li><a href=<?= Html::a("Url1", ["licencias/create"]);?>Agregar Licencia</a></li>
            </ul>
        </li>
        
      </ul>
  </div>
</nav> 

