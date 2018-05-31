<?php
session_start();

include 'DAOCitas.php';

if (isset($_SESSION["user"])) {
  



?>


<title>Usuarios</title>
<link rel="icon" type="image/png" href="../imagenes/secureNum.png"/>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.js">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script>
    $('#phone_with_ddd').mask('0000-0000');
</script>



<script type="text/javascript">
function validar(e) { // 1
tecla = (document.all) ? e.keyCode : e.which; // 2
if (tecla==8) return true; // 3
patron =/[A-Za-z\s]/; // 4
te = String.fromCharCode(tecla); // 5
return patron.test(te); // 6
}

function cargar(Id_Rol,Nombre,Apellido,Telefono,Username,Pass,nivel_acc){
      document.frm.txtIdRol.value=Id_Rol;
      document.frm.txtNombres.value=Nombre;
      document.frm.txtApellidos.value=Apellido;
      document.frm.txtTelefono.value=Telefono;
      document.frm.txtUsua.value=Username;
      document.frm.txtContra.value=Pass;
      document.frm.nivelAcc.value=nivel_acc;




    }

    function abrirPopupP() {
            window.open("popupPacientes.php", "popup2", "location=no,menubar=no,titlebar=no,resizable=no,toolbar=no, menubar=no,width=900,height=330, left=550, top=300"); 
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
  <br><br>
  <p align="right"><a href="vistaCitasD.php"><button class="btn btn-success">Volver a Inicio</button></a></p>
  <font color="#08298A">
  
  <center>
    <h1>Acontinuación se presenta información personal de los usuarios</h1>
    </font>
    <hr color="#08298A">
    <font color="red">
  <center>
  <h1><B>Registrar nuevo Usuario</h1>
    </font>


    
      <font color="#08298A">
  <form action="#" method="POST" name="frm">
    <font color="#08298A">
      <table width="900" align="center">

        <input  type="hidden"  name="txtIdRol" align="left">
        <tr>
          <th>
            <font color="#08298A"><center>
      <i class="icon-user"></i>
      <B>Nombres:<br><label>
      <input  type="text"  name="txtNombres" class="form-control" align="left" onkeypress="return validar(event)">
      </label>
    </th>
    <th>
      <font color="#08298A"><center>
      <i class="icon-user"></i>
     <B> Apellidos:<br><label>
      <input type="text" name="txtApellidos" class="form-control" onkeypress="return validar(event)">
      </label>
      </th>
      <th>
        <font color="#08298A"><center>
      <i class="icon-phone"></i>
     <B> Teléfono:<br><label>
      <input type="text"   name="txtTelefono"  id="phone_with_ddd" class="form-control">
      </label>
      </th>
    </tr>
    <tr>
      <td>
        <font color="#08298A"><center>
        <i class="icon-user"></i>
    <B>  Usuario:<br><label>
      <input type="text"   name="txtUsua" class="form-control"><br>
      </label>
      </td>
      <td>
        <font color="#08298A"><center>
        <i class="icon-lock"></i>
     <B> Contraseña:<br><label>
      <input type="text"   name="txtContra" class="form-control"><br>
    </label>
      </td>
      <td>
        <font color="#08298A"><center>
        <i class="icon-cogs"></i>
     <B> <label>Cargo:<br>
      </label>
      <label>
        <font color="#08298A"><center>
      <select name="nivelAcc" class="form-control">
        <font color="#08298A">
        <option value="1">Doctor/a</option>
        <option value="2">Secretario/a</option>
      </select>
      </label>
      
    </td>
  </tr>
    </table>
    <input type="submit" name="btnInsertar" value="Registrar" class="btn btn-danger">
        
      <input type="submit" name="btnModificar" value="Modificar" class="btn btn-danger">
    
      <input type="submit" name="btnEliminar" value="Eliminar" class="btn btn-danger">
  </form>


 
</div>
</td>
<td>
<form action="#" method="POST">
    <br>Buscar:&nbsp;&nbsp;<label><input type="text" name="txtCriterio" placeholder="Criterio de busqueda" class="form-control">
      </label>
    En base a:&nbsp;<label><select name="campos" class="form-control">
      <option value="Nombre">Nombre de Usuario</option>
      
    </select>
  </label>
    &nbsp;<input type="submit" name="btnFiltro" value="Filtrar" class="btn btn-primary">
    
    <input type="submit" name="btnReiniciar" value="Reiniciar" class="btn btn-primary">

    <br>
    
  </form><br><br>
  <table width="1000">
    <tr>
      <th>
        <center>

  <?php

  $dao= new DAOCitas();
  $e= new citas();

  if (isset($_REQUEST["btnInsertar"])) {

if($_REQUEST["txtNombres"]==null || $_REQUEST["txtApellidos"]==null|| $_REQUEST["txtUsua"]==null
        || $_REQUEST["txtContra"]==null|| $_REQUEST["txtTelefono"]==null){
      echo "<script>alert('Por favor llena todos los campos');</script>";
  }else{

    $e->setId_Rol($_REQUEST["txtIdRol"]);
    $e->setNombre($_REQUEST["txtNombres"]);
    $e->setApellido($_REQUEST["txtApellidos"]);
    $e->setTelefono($_REQUEST["txtTelefono"]);
    $e->setUsername($_REQUEST["txtUsua"]);
    $e->setPass($_REQUEST["txtContra"]);
    $e->setnivel_acc($_REQUEST["nivelAcc"]);

    if ($dao->insertarUs($e)) {
      echo "<script>alert('Ingresado correctamente');</script>";
      
      

      }else{
        echo "<script>alert('Error');</script>";
      }
    
  }
}
   if(isset($_REQUEST["btnEliminar"])){
    $id=$_REQUEST["txtIdRol"];

    if ($dao->eliminarUs($id)) {
    echo "<script>alert('Eliminado correctamente');</script>";
      echo $dao->opcion();   
    }else{
        echo "<script>alert('Error');</script>";
      }
  }
    else if(isset($_REQUEST["btnModificar"])){
    $e->setId_Rol($_REQUEST["txtIdRol"]);
    $e->setNombre($_REQUEST["txtNombres"]);
    $e->setApellido($_REQUEST["txtApellidos"]);
    $e->setTelefono($_REQUEST["txtTelefono"]);
    $e->setUsername($_REQUEST["txtUsua"]);
    $e->setPass($_REQUEST["txtContra"]);
    $e->setnivel_acc($_REQUEST["nivelAcc"]);
    
    if ($dao->modificarUS($e)) {
      echo "<script>alert('Modificado correctamente');</script>";
      echo $dao->opcion();
      }else{
        echo "<script>alert('Error');</script>";
      }

  }
   else if (isset($_REQUEST["btnFiltro"])) {
      $criterio = $_REQUEST["txtCriterio"];
      $campo= $_REQUEST["campos"];

      echo $dao->filtrarUs($criterio,$campo);

    }

  else{
    echo $dao->opcion();
  }

  ?>


  <?php
}else{
  header("location:loginAgain.php");
}
?>
</th>
</tr>
</table>
