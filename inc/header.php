<?php
    session_start();
?>
<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="col-sm-4 hidden-xs">
            <h3 "navbar-text">Francoise Dolto</h3>
        </div>
            <div class="dropdown pull-right">
                <button class="btn btn-barra navbar-btn dropdown-toggle glyphicon glyphicon-user" type="button" data-toggle="dropdown"> 
                    <?php
                        echo $_SESSION['usuario'];
                    ?>


                </button>
                <ul class="dropdown-menu">
                    <li><a href="../inc/Logout.php">Salir</a></li>
                </ul>
            </div> 
        <?php
            if($_SESSION['rol'] == 2){
                
        ?>
        <div class="pull-right">
            <button class="btn btn-barra navbar-btn "> Reporte de asistencia</button>
        </div>     
        <?php
            }
            
       ?>      
        </nav>         
</header>


