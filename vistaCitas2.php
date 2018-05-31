  <?php
session_start();
include 'DAOCitas.php';
if ($_SESSION["user"]) {
?>

<title>Citas</title>
<link rel="icon" type="image/png" href="../imagenes/calendar.png"/>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">


<script type="text/javascript">
    function cargar(Id_cita,Id_paciente,Fecha,Jornada){
      document.frm.txtNCita.value=Id_cita;
      document.frm.txtIdPa.value=Id_paciente;
      document.frm.txtFecha.value=Fecha;
      document.frm.Jornada.value=Jornada;
      



    }
    function abrirPopup2() {
            window.open("popupCitas.php", "popup2", "location=no,menubar=no,titlebar=no,resizable=no,toolbar=no, menubar=no,width=900,height=330, left=550, top=300"); 
        } 

    function abrirPopupC() {
            window.open("popupHistorialCitas.php", "popup2", "location=no,menubar=no,titlebar=no,resizable=no,toolbar=no, menubar=no,width=900,height=330, left=550, top=300"); 
        } 


  </script>
  <style type="text/css">
 body{
    background: url(../imagenes/fondo.jpg) no-repeat fixed center center;
    background-size: cover;

  }
</style>
  <meta charset="utf-8">
  <body>
    <br>
    <p align="right"><a href="vistaSecre.php"><button class="btn btn-warning">Volver a Inicio</button></a></p>
<center>
  <h1><font color="#08298A"><B>Ingresa los datos que se te piden acontinuación para registrar una nueva Cita</h1>



  <h1><B><font color="red"><B>Registro de citas</B></h1>

  <form action="#" method="POST" name="frm">
      <hr color="#08298A">
      
    
      <font color="#08298A"><B>
        <table width="1000">
          <tr>
            <th>
              <font color="#08298A"><B><center>
                <input type="hidden" name="txtNCita">
      <i class="icon-user"></i>

      Id de Paciente<br><label>
      <input  type="text"  name="txtIdPa" class="form-control"></label>&nbsp;<a href="#"  onclick="abrirPopup2()"><img src="../imagenes/buscar.jpg" width="35" height="35"></a><br>
      </th>
      <th>
        <font color="#08298A"><B><center>
      <i class="icon-calendar"></i>
      Fecha de cita<br><label>
      <input type="date" class="form-control"  name="txtFecha" 
      min=
      <?php
      date_default_timezone_set('America/El_Salvador');
     $hoy=date("Y-m-d"); echo $hoy;
       ?>></label>
    </th>
     <th>
      <font color="#08298A"><B><center>
      <i class="icon-time"></i>
      Jornada de cita<br><label>
      <select name="Jornada" class="form-control">


        <option value="Matutina">Matutina</option>
        <option value="Vespertina">Vespertina</option>
      </select></label>
      <input type="hidden"   name="txtEstado" value="Pendiente"><br>
      
    </th>
  </tr>
  </table>
  <br>
   <input type="submit" name="btnInsertar" value="Insertar" class="btn btn-primary">&nbsp;
   <input type="submit" name="btnEliminar" value="Eliminar" class="btn btn-primary">&nbsp;
    <input type="submit" name="btnModificar" value="Modificar" class="btn btn-primary">&nbsp;
    
   
  </form>
 



<form action="#" method="POST">
  <font color="#08298A"><B>
    <br><B>Buscar:&nbsp;&nbsp;<label><input type="text" name="txtCriterio" placeholder="Criterio de busqueda" class="form-control"></label>
    En base a:&nbsp;<label><select name="campos" type="hidden" class="form-control">
      <option value="Nombre">Nombre </option>
      
      <option value="Fecha">Fecha de cita</option>
      
    </select></label>
    &nbsp;<input type="submit" name="btnFiltro" value="Filtrar" class="btn btn-danger">
    <input type="submit" name="btnReiniciar" value="Reiniciar" class="btn btn-danger">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btn btn-success" onclick="abrirPopupC()">Historial de Citas</a>
    
    <br><br><br>
    
  </form>
  <table width="1000">
    <tr>
      <th>
        <center>

<?php

  $dao= new DAOCitas();
  $e= new Citas();

  

  if (isset($_REQUEST["btnInsertar"])) {
  
    if($_REQUEST["txtIdPa"]==null || $_REQUEST["txtFecha"]==null || $_REQUEST["Jornada"]==null){
      echo "<script>alert('Por favor llena todos los campos');</script>";
      echo $dao->seleccionarCitas();
    }else{
    $e->setId_paciente($_REQUEST["txtIdPa"]);
    $e->setFecha($_REQUEST["txtFecha"]);
    $e->setJornada($_REQUEST["Jornada"]);
    $e->setEstado($_REQUEST["txtEstado"]);

    if ($dao->insertar($e)) {
      echo "<script>alert('Ingresado correctamente');</script>";
      echo $dao->seleccionarCitas();
      }else{
        echo "<script>alert('Error');</script>";
      }
    }
  }

    

 else if(isset($_REQUEST["btnEliminar"])){
    $id=$_REQUEST["txtNCita"];

    if ($dao->eliminar($id)) {
    echo "<script>alert('Eliminado correctamente');</script>";
      echo $dao->seleccionarCitas();   
    }else{
        echo "<script>alert('Error');</script>";
      }
  }
  else if(isset($_REQUEST["btnModificar"])){
    $e->setId_cita($_REQUEST["txtNCita"]);
    $e->setId_paciente($_REQUEST["txtIdPa"]);
    $e->setFecha($_REQUEST["txtFecha"]);
    $e->setJornada($_REQUEST["Jornada"]);
    
    if ($dao->modificar($e)) {
      echo "<script>alert('Modificado correctamente');</script>";
      echo $dao->seleccionarCitas();
      }else{
        echo "<script>alert('Error');</script>";
      }

  }
  else if (isset($_REQUEST["btnFiltro"])) {
      $criterio = $_REQUEST["txtCriterio"];
      $campo= $_REQUEST["campos"];

      echo $dao->filtrarC($criterio,$campo);

    }
  
  else{
    echo $dao->seleccionarCitas(); 
  }




  ?>
</td>
</tr>
</table>
</body>
<?php
}
  else{
  header("location:../login/login.php");

}

?>