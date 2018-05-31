<?php
include "../credenciales.php";
$con= new mysqli(SERVIDOR,USUARIO,CONTRA,BD);
$sql="select count(Diag_Corto) as Enfermedad, Diag_Corto  from diagnosticos group by Diag_Corto";
$res=$con->query($sql);

$Cantidad=mysqli_num_rows($res);

$enferms=null;
$i=1;

if ($Cantidad==1) {
  while ($fila=$res->fetch_assoc()) {
   $enferms[$i]=$fila['Enfermedad'];
   $i++;
  }
}


?>

<html lang="">
  <head>
    <link rel="icon" type="image/png" href="../imagenes/graphic.png"/>
    <title>Enfermedades </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.js">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
 
    <style>
       body{
    background: url(../imagenes/fondo.jpg) no-repeat fixed center center;
    background-size: cover;

  }
    </style>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Enfermedad', 'Cantidad'],
           <?php
          while ($fila=$res->fetch_assoc()) {
          echo "['".$fila["Diag_Corto"]."',".$fila["Enfermedad"]."],";
         // ['Work',     11],
          
          }
          ?>
        ]);

        var options = {
          title: 'Enfermedades comunes',
          width: 910,
    height: 660,
    backgroundColor: '',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);



      }

    </script>
  </head>
  <body>
    <br><p align="left">&nbsp;&nbsp;&nbsp;&nbsp;<a href="vistaCitasD.php"><input type="submit" name="btnGrafica" value="Volver a inicio" class="btn btn-warning"></a></p>
    <h1><center><font color="#08298A">Grafico de Enfermedades</font></h1>
    <center><div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>