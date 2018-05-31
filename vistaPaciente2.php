<?php
session_start();
include 'DAOPaciente.php';

if ($_SESSION["user"]) {
  

?>


<title>Pacientes</title>
<link rel="icon" type="image/png" href="../imagenes/secureNum.png"/>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">

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

function cargar(Id_Paciente,Nombre,Domicilio,Telefono,fecha_nac){
      document.frm.txtIdP.value=Id_Paciente;
      document.frm.txtNombreP.value=Nombre;
      document.frm.txtDirec.value=Domicilio;
      document.frm.txtTelefono.value=Telefono;
      document.frm.txtFechaN.value=fecha_nac;



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
  <br>
  <p align="right"><a href="../citas/vistaSecre.php"><button class="btn btn-success">Volver a Inicio</button></a></p>
  
  <center>
    <h1><font color="#08298A"><B>Ingresa los datos que se te piden acontinuación para registrar un nuevo Paciente</font></h1>
    
  <center>
  <h1><B><font color="red">Registro de Paciente</font></B></h1>

  <form action="#" method="POST" name="frm">
     
      <font color="#08298A">
        <table width="1000" align="center">
          <tr>
            <th>
        <input  type="hidden"  name="txtIdP" align="left">
        <font color="#08298A"><B>
      <i class="icon-user"></i>

      Nombre de Paciente:<br><label>
      <input  type="text"  name="txtNombreP" class="form-control" align="left" onkeypress="return validar(event)">
    </label>
    </th>
  
    <th>
      <font color="#08298A"><B>
      <i class="icon-home"></i>
      Dirección:<br><label>
      <input type="text" name="txtDirec" class="form-control">
    </label>
    </th>
  
    <th>
      <font color="#08298A"><B>
      <i class="icon-phone"></i>

      Teléfono:<br><label>
      <input type="text"   name="txtTelefono" id="phone_with_ddd" class="form-control">
      </label>
          </th>
   
      <th>
        <font color="#08298A"><B>
      <i class="icon-calendar"></i>
      
      Fecha de Nacimiento:<br><label>
      <input type="date" name="txtFechaN" class="form-control">
      </label>
      <input type="hidden" name="txtEs" value="sin"><br>
    </th>
  </tr>
    </font><br>
      
  
  
     </div>
     </table>
     <br><input type="submit" name="btnInsertar" value="Registrar" class="btn btn-primary">
      <input type="submit" name="btnModificar" value="Modificar" class="btn btn-primary">
      <input type="submit" name="btnEliminar" value="Eliminar" class="btn btn-primary"><br>
  </form>


 
</div>
</td>
<td>
<form action="#" method="POST">
  <font color="#08298A"><B>
    <br>Buscar:&nbsp;&nbsp;<label><input type="text" name="txtCriterio" placeholder="Criterio de busqueda" class="form-control"></label>
    En base a:&nbsp;<label><select name="campos" class="form-control">
      <option value="Nombre">Nombre de Paciente</option>
      
    </select>
    </label>
    &nbsp;<input type="submit" name="btnFiltro" value="Filtrar" class="btn btn-danger">
    
    <input type="submit" name="btnReiniciar" value="Reiniciar" class="btn btn-danger">

   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#" class="btn btn-warning" onclick="abrirPopupP()">Registro de Pacientes</a>

    <br>
    
  </form><br><br>
  <hr color="black">
  <h1><font color="red"><B>Lista de pacientes sin expediente</B></font></h1>
  <table width="1000" align="center">
    <tr>
      <th>

<?php
}
else{
  header("location:../login/login.php");
}
  $dao= new DAOPaciente();
  $e= new Pacientes();

  if (isset($_REQUEST["btnInsertar"])) {

    if($_REQUEST["txtNombreP"]==null || $_REQUEST["txtDirec"]==null || $_REQUEST["txtTelefono"]==null|| $_REQUEST["txtFechaN"]==null){
      echo "<script>alert('Por favor llena todos los campos');</script>";
      echo $dao->seleccionar();
    }else{
    
    
    $e->setNombre($_REQUEST["txtNombreP"]);
    $e->setDomicilio($_REQUEST["txtDirec"]);
    $e->setTelefono($_REQUEST["txtTelefono"]);
    $e->setfecha_nac($_REQUEST["txtFechaN"]);
    $e->setestado($_REQUEST["txtEs"]);

    if ($dao->insertar($e)) {
      echo "<script>alert('Ingresado correctamente');</script>";
      echo $dao->seleccionar();
      }else{
        echo "<script>alert('Error');</script>";
      }

  }
}
  
  else if(isset($_REQUEST["btnFiltro"])){
    $criterio = $_REQUEST["txtCriterio"];
      $campo= $_REQUEST["campos"];

      echo $dao->filtrar($criterio,$campo);
  }
  else if(isset($_REQUEST["btnModificar"])){
  $e->setId_paciente($_REQUEST["txtIdP"]);
    $e->setNombre($_REQUEST["txtNombreP"]);
    $e->setDomicilio($_REQUEST["txtDirec"]);
    $e->setTelefono($_REQUEST["txtTelefono"]);
    $e->setfecha_nac($_REQUEST["txtFechaN"]);
    
    if ($dao->modificar($e)) {
      echo "<script>alert('Modificado correctamente');</script>";
      echo $dao->seleccionar();
      }else{
        echo "<script>alert('Error');</script>";
      }

  }
  else if(isset($_REQUEST["btnEliminar"])){
    $id=$_REQUEST["txtIdP"];

    if ($dao->eliminar($id)) {
    echo "<script>alert('Eliminado correctamente');</script>";
      echo $dao->seleccionar();   
    }else{
        echo "<script>alert('Error');</script>";
      }
  }


  else{
  echo $dao->seleccionar();
}
  ?>
</th>
</tr>
</table>
</body>
 
 
