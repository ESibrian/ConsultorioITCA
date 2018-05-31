<?php
session_start();

include 'DAODiagnosticos.php';
if(isset($_REQUEST["Id_Exp"])&&($_REQUEST["fecha"])){
$Id_Expe=$_REQUEST["Id_Exp"];
$nom=$_REQUEST["Nombre"];
$fecha=$_REQUEST["fecha"];
}else{
  header("location:../citas/vistaCitasD.php");
}
 
 if ($_SESSION["user"]["nivel"]==1){


?>
  <?php
  $dao= new DAODiagnosticos();
  $e= new Diagnostico();

    if (isset($_REQUEST["btnInsertar"])) {

      if($_REQUEST["txtDescripcion"]==null || $_REQUEST["txtMedicamentos"]==null|| $_REQUEST["txtPresion"]==null
        || $_REQUEST["txtAltura"]==null|| $_REQUEST["txtPeso"]==null){
      echo "<script>alert('Por favor llena todos los campos');</script>";
     
    }else{
    
    $_SESSION["medi"] = $_REQUEST["txtMedicamentos"];
    $_SESSION["sintomas"] = $_REQUEST["txtDescripcion"];
    $e->setId_Exp($_REQUEST["txtIdEx"]);
    $e->setDescripcion($_REQUEST["txtDescripcion"]);
    $e->setMedicamentos($_REQUEST["txtMedicamentos"]);
    $e->setPresion($_REQUEST["txtPresion"]);
    $e->setAltura($_REQUEST["txtAltura"]);
    $e->setPeso($_REQUEST["txtPeso"]);
    $e->setDiag_Corto($_REQUEST["Enfermedad"]);
    $e->setFecha_Diag($_REQUEST["txtFechaDi"]);
    $e->setHora($_REQUEST["txtHoraD"]);
    if ($dao->insertar($e)) {
      echo "<script>alert('Ingresado correctamente');</script>";
      }else{
        echo "<script>alert('Error');</script>";
      }
    }
  }
 if (isset($_SESSION["medi"])&&($_SESSION["sintomas"])) {
   $medi= $_SESSION["medi"];
   $sintomas=$_SESSION["sintomas"];
    if (isset($_REQUEST["btnConstancia"])) {
      //header("location:reporteConstancia.php?nombre=$nom&&fecha=$fecha");
        echo "<script>var url='reporteConstancia.php?nombre=$nom&&fecha=$fecha';
        window.open(url,'_blank');
        </script>";


    }
    else if (isset($_REQUEST["btnReceta"])) {

      //header("location:reporteReceta.php?nombre=$nom&&fecha=$fecha&&medi=$medi");
      echo "<script>var url='reporteReceta.php?nombre=$nom&&fecha=$fecha&&medi=$medi';
        window.open(url,'_blank');
        </script>";
    }
    else if (isset($_REQUEST["btnIncapacidad"])) {
     // header("location:reporteIncapacidad.php?nombre=$nom&&fecha=$fecha&&sintomas=$sintomas");
      echo "<script>var url='reporteIncapacidad.php?nombre=$nom&&fecha=$fecha&&sintomas=$sintomas';
        window.open(url,'_blank');
        </script>";
    }
 
}


    ?>
<script type="text/javascript">
         function cargar($Id_Exp) { 
            document.frm.txtIdEx.value=$Id_Exp;  
         }        
    function abrirPopup2() {
      var id =document.frm.txtIdEx.value;
                  window.open("popupHistorial.php?idEx="+id, "popup2", "location=no,menubar=no,titlebar=no,resizable=no,toolbar=no, menubar=no,width=1000,height=300, left=500, top=300"); 
        }
         function abrirPopup() {
      var id =document.frm.txtIdEx.value;
                  window.open("popupUltima.php?idEx="+id, "popup2", "location=no,menubar=no,titlebar=no,resizable=no,toolbar=no, menubar=no,width=1000,height=300, left=500, top=300"); 
        }
  </script>
   <style type="text/css">
 body{
    background: url(../imagenes/fondo.jpg) no-repeat fixed center center;
    background-size: cover;

  }
</style>
<title>Diagnosticos</title>
<link rel="icon" type="image/png" href="../imagenes/diagnostico.png"/>
<meta charset="utf-8">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<script type="text/javascript" src="jquery.js"></script>
<link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.js">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script>
    $('#presion').mask('000/00 mmHg');
    $('#altura').mask('0.00 mts');
    $('#peso').mask('00.0 kg');
</script>
<body>
  <br>
  <p align="right"><a href="../citas/vistaCitasD.php"><button class="btn btn-success">Volver a Inicio</button></a></p>
  <center>
  <h1><font color="#08298A"><B>Registrar un nuevo Diagnostico para:<br></font> <B><font color="red"><?php echo $nom; ?></font> <B></h1>



  <form action="#" method="POST" name="frm">

      <hr color="#08298A">

      <font color="#08298A">
         <center>
          
          <table width="1000" cellspacing="10%">
            <tr>
            <th>
              <font color="#08298A">
                <center>

      
      
      <input  type="hidden"  name="txtIdEx" class="form-control"  value="<?php echo $Id_Expe;?>">
    </label>
    </th>
  </tr>
  </table>
 <hr>
                  <h2><font color="red">Datos fisicos</font></h2>

  <table width="1000" cellspacing="10%">
  <tr>
    
    <th>
      <font color="#08298A"><B>
        <center>
      <i class="icon-plus-sign"></i>
      Presion<br><label>
      <input type="text"   name="txtPresion" id="presion" class="form-control"><br>
    </label>
    </th>
    <th>
<font color="#08298A"><B>
  <center>
      <i class="icon-resize-vertical"></i>
      Altura<br><label>
      <input type="text"   name="txtAltura" id="altura" class="form-control"><br>
      </label>
      </th>
      <th>
<font color="#08298A"><B>
  <center>
      <i class="icon-dashboard"></i>
      Peso<br><label>
      <input type="text"   name="txtPeso" id="peso" class="form-control"><br>
    </label>
    
      </th>
      </tr>
      
    </table>
   
    <table width="1000" cellspacing="10%">
      <hr>
                  <h2><font color="red">Datos de consulta</font></h2>

      <tr>
        <td></td>
      </tr>

      <tr>

      <td colspan="2" colspan="4" valign="middle" align="center">
      

      <font color="#08298A"><B>
  <i class="icon-pencil"></i>
      Descripcion del paciente:<br><label>
      <textarea name="txtDescripcion" cols="40" rows="3" class="form-control"></textarea>
      </label>
    </td>
      
    <td colspan="3" valign="middle" align="center">
      <font color="#08298A"><B>
      <br><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-list-alt"></i>
     Diagnostico Corto:  <label>
      
       
      <SELECT name="Enfermedad" class="form-control" width="20px" height="20px" onchange="if(this.value=='Otro') {document.getElementById('otraEnfer').disabled = false} 
      else {document.getElementById('otraEnfer').disabled = true}">

    <?php
    echo $dao->paraSelect();

    ?>
    

    
  </label>
<br>
  <font color='#08298A'><B>
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;En caso de otro: &nbsp; <label><input type='text' id='otraEnfer' class='form-control' name='Enfermedad' placeholder='Nombre de Enfermedad' disabled></label>
      </font><br>
    
      <input  type="hidden"  name="txtFechaDi" align="left" value="<?php echo $fecha;?>">
      <input  type="hidden"  name="txtHoraD" align="left" value="" id="hora">
      
     </td>
   </tr>
     <tr>
     <td rowspan="4" colspan="4" align="center" valign="middle">

     <label>
      <font color="#08298A"><B>
  <br><i class="icon-list-alt"></i>
  
      Medicamentos:

      <textarea name="txtMedicamentos" cols="40" rows="3" class="form-control"></textarea>
      </label>

    </td>
    
  </tr>
  <tr>

      </table>
      <hr>
      <br><input type="submit" name="btnInsertar" value="Crear Diagnostico" class="btn btn-primary">
      
  </form>

  <form action="#" method="POST">
    <br><a href="#" class="btn btn-danger" onclick="abrirPopup2()">Historial</a>
  <a href="#" class="btn btn-danger" onclick="abrirPopup()">Consulta Anterior</a>
  <input type="submit" name="btnIncapacidad" class="btn btn-danger" value="Generar Incapacidad">
  <input type="submit" name="btnConstancia" class="btn btn-danger" value="Generar Constancia">
  <input type="submit" name="btnReceta" class="btn btn-danger" value="Generar Receta">
</form>


  

</body>

<script type="text/javascript">
  $(document).ready(function(){

    var hoy = new Date();
    var hora= hoy.getHours();
if (hora>=12) {
  var sufijo="PM";
    }else{
      var sufijo="AM";
    }
 if (hora<10) {
  hora='0'+hora;
 }
    var minutes= hoy.getMinutes();
    if(minutes<10) {
  minutes='0'+minutes;
 }
    var horaReal=hora+":"+minutes+" "+sufijo;
    $("#hora").val(horaReal);
  });
</script>

<?php
}
  else if($_SESSION["user"]["nivel"]==2){
  header("location:../index.php");
}else{
  header("location:../login/login.php");
}

?>