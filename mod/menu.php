
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
        <?php
        require_once '../inc/header.php'; 
        ?>
        
        <div class="text-center">
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <a href="abmprofesionales.html" class="btn-principal btn"><img src="../iconos/doctor.png" alt="Profesionales"><br>Profesionales</a>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <a href="abmconsultorios.html" class="btn-principal btn"><img src="../iconos/consultorio.png" alt="Consultorio"><br>Consultorios</a>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <a href="abmosocial.html" class="btn-principal btn"><img src="../iconos/os.png" alt="os/prepagas"><br>O. sociales/Prepagas</a>
        </div>
        
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <a href="abmpacientes.html" class="btn-principal btn"><img src="../iconos/paciente.png" alt="Paciente"><br>Pacientes</a>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <a href="abmturnos.html" class="btn-principal btn"><img src="../iconos/turno.png" alt="Turno"><br>Turnos</a>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-4">
            <a href="" class="btn-principal btn"><img src="../iconos/asistencia.png" alt="registro de asistencia"><br>Registrar asistencia</a>
        </div>
    </div>
    </div>
    <?php
        require_once '../inc/footer.php'; 
    ?>
</body>
</html>
