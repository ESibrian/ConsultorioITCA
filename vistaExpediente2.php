<?php
session_start();
include 'DAOExpedientes.php';

if ($_SESSION["user"]) {
  $Id_Pac=$_REQUEST["Id_Paciente"];
  $nom=$_REQUEST["Nombre"];

?>

<title>Expedientes</title>
<link rel="icon" type="image/png" href="../imagenes/expediente.png"/>



<script type="text/javascript">
  
      function abrirPopup2() {
            window.open("popupExpediente.php", "popup2", "location=no,menubar=no,titlebar=no,resizable=no,toolbar=no, menubar=no,width=900,height=330, left=550, top=300"); 
        } 

        function cargar(Id_Exp,Id_paciente,Tipo_Sangre,Num_Seguro){
      document.frm.txtNex.value=Id_Exp;
      document.frm.txtId_Paciente.value=Id_paciente;
      document.frm.txtTipoS.value=Tipo_Sangre;
      document.frm.txtNse.value=Num_Seguro;



    }
</script>

<style type="text/css">
 body{
    background: url(../imagenes/fondo.jpg) no-repeat fixed center center;
    background-size: cover;

  }
</style>

<meta charset="utf-8">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">

<body>
  
  <br>
  <p align="right">

   <a href="../paciente/vistaPaciente2.php"><button class="btn btn-success">Registrar un nuevo Paciente</button></a>

<a href="../citas/vistaSecre.php"><button class="btn btn-warning" >Volver a Inicio</button></a>
 </p>
 
  <center>
  <h1><font color="#08298A"><B>Ingresa los datos que se te piden acontinuación para registrar un nuevo Expediente</h1>
  <br><br><br>

  <h1><font color="red">Registro de Expediente para <B><?php echo $nom; ?></B></h1>

  <form action="#" method="POST" name="frm">
      <hr color="#08298A">
    
      <font color="#08298A">
        <table width="1000">
          <tr>
            <th>
        <input type="hidden" name="txtNex">
        <center><font color="#08298A"><B>
      
      
      
      <input  type="hidden"  name="txtId_Paciente" align="left"  class="form-control" value="<?php echo $Id_Pac; ?>">
      </label>
      </th>
      <th>
        <center><font color="#08298A"><B>
      <i class="icon-tint"></i>
      Tipo de Sangre<br><label>
      <input type="text" name="txtTipoS" class="form-control">
    </label>
      </th>
      <th>
        <center><font color="#08298A"><B>
      <i class="icon-heart"></i>
      Codigo de Seguro<br><label>
      <input type="text"   name="txtNse" class="form-control">
      </label>
    </th>
  </tr>
      </table>
     
      <br>
      <input type="submit" name="btnInsertar" class="btn btn-primary" value="Insertar">
      <input type="submit" name="btnEliminar" class="btn btn-primary" value="Eliminar">
      <input type="submit" name="btnModificar" class="btn btn-primary" value="Modificar">
  
  
     
     
  </form>
  <hr>
  <form action="#" method="POST">
  <font color="#08298A"><B>
    <br>Buscar expediente de:&nbsp;&nbsp;<label><input type="text" name="txtCriterio" placeholder="Criterio de busqueda" class="form-control"></label>
    <label><input type="hidden" name="campos" value="Nombre">
      
    </select>
    </label>
    &nbsp;<input type="submit" name="btnFiltro" value="Filtrar" class="btn btn-danger">
    
    <input type="submit" name="btnReiniciar" value="Reiniciar" class="btn btn-danger">



    <br>
    
  </form><br><br>
  <table width="1000">
    <tr>
      <th>

<?php
  $dao= new DAOExpedientes();
  $e= new Expedientes();

  if (isset($_REQUEST["btnInsertar"])) {

   $e->setId_Exp($_REQUEST["txtNex"]);
    $e->setId_paciente($_REQUEST["txtId_Paciente"]);
    $e->setTipo_Sangre($_REQUEST["txtTipoS"]);
    $e->setNum_Seguro($_REQUEST["txtNse"]);

    if ($dao->insertar($e)) {
      echo "<script>alert('Ingresado correctamente');</script>";
      
      echo $dao->seleccionar();

      }else{
        echo "<script>alert('Error');</script>";
      }

  }
  else if(isset($_REQUEST["btnEliminar"])){
    $id=$_REQUEST["txtNex"];

    if ($dao->eliminar($id)) {
    echo "<script>alert('Eliminado correctamente');</script>";
      echo $dao->seleccionar();   
    }else{
        echo "<script>alert('Error');</script>";
      }
  }

  else if(isset($_REQUEST["btnFiltro"])){
    $criterio = $_REQUEST["txtCriterio"];
      $campo= $_REQUEST["campos"];

      echo $dao->filtrar($criterio,$campo);
  }
  else if(isset($_REQUEST["btnModificar"])){
    $e->setId_Exp($_REQUEST["txtNex"]);
    
    $e->setTipo_Sangre($_REQUEST["txtTipoS"]);
    $e->setNum_Seguro($_REQUEST["txtNse"]);
    
    
    if ($dao->modificar($e)) {
      echo "<script>alert('Modificado correctamente');</script>";
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
<?php
}else{
  header("location:../login/login.php");
}
?>