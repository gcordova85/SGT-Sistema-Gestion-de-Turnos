<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultorios Francoise Dolto</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
    <script src="../js/jquery-3.2.1.js"></script>   
    <script src="../js/bootstrap.min.js"></script>  
    <link rel="stylesheet" href="../css/styleMenu.css">
    <link rel="stylesheet" href="../css/styleBase.css">

</head>
<body >
    <div class="container">
        <?php  require_once '../inc/header.php'; 
        ?>
        <?php
            if($_SESSION['rol'] == 3){
                
        ?>
        <div class="text-center">
            <div class="form-group col-xs-12 col-sm-6">
                <a href="abmusuarios.php" class="btn-principal btn"><img src="../iconos/usuario.png" alt="Usuarios"><br>Usuarios</a>
            </div>
            <div class="form-group col-xs-12 col-sm-6">
                <a href="configDias.php" class="btn-principal btn"><img src="../iconos/configuraciones.png" alt="Configuraciones"><br>Configuraciones</a>
            </div>
        </div>
    <?php
       }
       else{
                
    ?>
        <div class="text-center">
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <a href="abmprofesionales.php" class="btn-principal btn"><img src="../iconos/doctor.png" alt="Profesionales"><br>Profesionales</a>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <a href="abmconsultorios.php" class="btn-principal btn"><img src="../iconos/consultorio.png" alt="Consultorio"><br>Consultorios</a>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <a href="abmosocial.php" class="btn-principal btn"><img src="../iconos/os.png" alt="os/prepagas"><br>O. sociales/Prepagas</a>
        </div>
        
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <a href="paciente.php" class="btn-principal btn"><img src="../iconos/paciente.png" alt="Paciente"><br>Pacientes</a>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <a href="abmturnos.php" class="btn-principal btn"><img src="../iconos/turno.png" alt="Turno"><br>Turnos</a>
        </div>
        <?php
            if($_SESSION['rol'] == 2){
                
        ?>
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <a href="registrarAsistencia.php" class="btn-principal btn"><img src="../iconos/asistencia.png" alt="registro de asistencia"><br>Registrar asistencia</a>
        </div>
        <?php
            } ;           
        ?>
    </div>
    </div>
    <?php
        }            
    ?>

    <?php
        require_once '../inc/footer.php'; 
    ?>
</body>
</html>
