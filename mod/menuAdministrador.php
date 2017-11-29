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
    <link rel="stylesheet" href="../css/styleMenuAdministrador.css">
    <link rel="stylesheet" href="../css/styleBase.css">
</head>
<body >
    <div class="container">
            <?php
            require_once '../inc/header.php'; 
            ?>      
        <div class="text-center">
            <div class="form-group col-xs-12 col-sm-4">
                <a href="" class="btn-principal btn"><img src="../iconos/usuario.png" alt="Usuarios"><br>Usuarios</a>
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <a href="jornadas.php" class="btn-principal btn"><img src="../iconos/configuraciones.png" alt="Configuraciones"><br>Configuraciones</a>
            </div>
             <div class="form-group col-xs-12 col-sm-4">
                <a href="jornadas.php" class="btn-principal btn"><img src="" alt="Jornadas"><br>Jornada</a>
            </div> 
        </div>
        
        
    </div>

    <?php
    require_once '../inc/footer.php'; 
    ?>
</body>
</html>