<?php
session_start();
include 'DAOCitas.php';
?>
<html>
<head>
    <link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">
    <meta charset="utf-8">
    <style>
        table{
            font-size: 12px;
            border-style: solid;
            border: 1px;
            border-color: black;            
        }

         body{
    background: url(../imagenes/fondo.jpg) no-repeat fixed center center;
    background-size: cover;

  }
    </style>
    
	<script type="text/javascript">
         function cargar(Id_paciente) { 
            window.opener.document.frm.txtIdPa.value = Id_paciente;
             this.window.close();
         }        
	</script>
</head>
<body onblur="self.close()">

    <form action="#" method="POST">
    <br><B>Buscar:&nbsp;&nbsp;<label><input type="text" name="txtCriterio" placeholder="Criterio de busqueda" class="form-control"></label>
    En base a:&nbsp;<label><select name="campos" type="hidden"  class="form-control">
      <option value="Nombre">Nombre </option>
      
      <option value="Fecha">Fecha de cita</option>
      
    </select>
</label>
    &nbsp;<input type="submit" name="btnFiltro" value="Filtrar" class="btn btn-primary">
    <input type="submit" name="btnReiniciar" value="Reiniciar" class="btn btn-primary">
    <br>
        <br>
    </form>
<?php
$t = new DAOCitas();

     
 if (isset($_REQUEST["btnFiltro"])) {
            $criterio = $_REQUEST["txtCriterio"];
            $campo= $_REQUEST["campos"];

            echo $t->filtrarH($criterio,$campo);

        }else{
            print $t->popup2C();
        }
     
?>
</body>
</html>