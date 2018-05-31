<?php
session_start();
include 'DAOCitas.php';

if ($_SESSION["user"]["nivel"]==1) {
	

?>

<title>Citas</title>
<link rel="icon" type="image/png" href="../imagenes/calendar.png"/>
<meta charset="utf-8">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.js">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
 

 <style type="text/css">
 body{
    background: url(../imagenes/fondo.jpg) no-repeat fixed center center;
    background-size: cover;

  }
</style>

  


<body>
  <div class="container">
    <div class="row">
    <center>
      
      <h1><font color="#08298A">Bienvenido Dr. <B><?php echo $_SESSION["user"]["nombre"];?>&nbsp;<?php echo $_SESSION["user"]["apellido"]; ?></B>  acontinuación se detallan las citas a realizar</font></h1><br>
      <div class="clearfix"></div>
    
      <div class="form-column col-md-4 col-sm-5 col-xs-4">

    <a href="grafica.php"><input type="submit" name="btnGrafica" value="Grafico de Enfermedades" class="btn btn-danger">
</div>
<div class="form-column col-md-4 col-sm-5 col-xs-4">
  <a href="loginAgain.php"><input type="submit" name="btnLoginA" value="Opciones" class="btn btn-danger"></a></p>
  </a></div>
    <div class="form-column col-md-4 col-sm-5 col-xs-4">
    

    <a href="../login/acceso.php?cerrar=true"><button class="btn btn-success">Cerrar sesion</button></a>
  </div>
  <div class="clearfix"></div>
</a>
</div>
</center>
</div>
</div>


<form action="#" method="POST">
      <center><br><br>
        <font color="#08298A"><B>
      Buscar:&nbsp;<label><input type="text" name="txtCriterio" placeholder="Criterio de busqueda" class="form-control">
    </label>
      En base a:&nbsp;<label><select name="campos" class="form-control">
        <option value="Nombre" >Nombre de Paciente</option>
        <option value="Jornada">Jornada</option>
        
      </select></label>
    <input type="submit" name="btnFiltro" value="Filtrar" class="btn btn-primary">
 
   <input type="submit" name="btnReiniciar" value="Reiniciar" class="btn btn-primary">
    
  </form>
  <br><br><br>
  <table width="1000">
    <tr>
      <th>
    <?php
}
else{
  header("location:../login/login.php");
}

  $dao= new DAOCitas();

  if(isset($_REQUEST["btnFiltro"])){
  	$criterio = $_REQUEST["txtCriterio"];
			$campo= $_REQUEST["campos"];

			echo $dao->filtrarCD($criterio,$campo);
  }
  else{
  	echo $dao->seleccionarD();
    
   
  }
  ?>
</th>
</tr>
  </table>

  </center>

  </body>

