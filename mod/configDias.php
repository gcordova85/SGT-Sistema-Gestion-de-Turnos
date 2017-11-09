<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultorios Francoise Dolto</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/scriptDias.js"></script>   
    <script src="../js/bootstrap.min.js"></script>  
    <link rel="stylesheet" href="../css/styleBase.css">
    <link rel="stylesheet" href="../css/styleConfigDias.css">
</head>
<body >
    <div class="container">

            <?php
            require_once '../inc/header.php'; 
            ?>

        <div id="titulo" class="text-center">        
            <h2>Configuración de días no laborables</h2>
        </div>
        <form action="POST" class="form-inline">
            <div class="form-group">
                <label for="dia" class="control-label">Día</label>
                <select class="form-control" name="dia" id="dia">
                    <option value="01">1</option>
                    <option value="02">2</option>
                    <option value="03">3</option>
                    <option value="04">4</option>
                    <option value="05">5</option>
                    <option value="06">6</option>
                    <option value="07">7</option>
                    <option value="08">8</option>
                    <option value="09">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="16">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="mes" class="control-label"> Mes</label>
                <select name="mes" id="mes" class="form-control">
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ano" class="control-label"> Año</label>
                <select name="ano" id="ano" class="form-control">
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                </select>
            </div>
            <input type="button" id="agregar" class="btn" value="Agregar">
        </form>
   
        <div class="table-responsive">
            <table id="tabla" class="table table-striped table-bordered table-hover table-condensed"> 
               <tr>
                   <th>Dia</th>
                   <th>Mes</th>
                   <th>Año</th>
                   <th>Quitar de la lista</th>
               </tr>
               <!--<tr>
                   <td>1</td>
                   <td>12</td>
                   <td>2017</td>
                   <td>boton</td>
               </tr>-->
              
             </table>
    </div>

    <?php
    require_once '../inc/footer.php'; 
    ?>
   
</body>
</html>