<?php
    session_start();
?>
<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="col-xs-4">
            <h3 "navbar-text">Francoise Dolto</h3>
        </div>
            <div class="dropdown pull-right">
                <button class="btn btn-barra navbar-btn dropdown-toggle glyphicon glyphicon-user" type="button" data-toggle="dropdown"> 
                <?php
                    echo "Hola!,".$_SESSION['usuario'];
                ?>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="../inc/Logout.php">Salir</a></li>
                </ul>
            </div> 
        <div class="pull-right">
            <button class="btn btn-barra navbar-btn "> Reporte de asistencia</button>
        </div>           
        </nav>         
</header>

