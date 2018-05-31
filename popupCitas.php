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
        <br>Buscar:&nbsp;<input type="text" name="txtCriterio" placeholder="Criterio de busqueda">
        En base a:&nbsp;<select name="campos">
            <option value="Id_Paciente">ID de Paciente </option>
            <option value="Nombre">Nombre de Paciente</option>
            <option value="Domicilio">Direccion</option>
            <option value="Telefono">Telefono</option>
            <option value="fecha_nac">Fecha de Nacimiento</option>
        </select>
        &nbsp;<input type="submit" name="btnFiltro" value="Filtrar" class="btn btn-danger"><br>
        
    </form>
<?php
$t = new DAOCitas();

     
 if (isset($_REQUEST["btnFiltro"])) {
            $criterio = $_REQUEST["txtCriterio"];
            $campo= $_REQUEST["campos"];

            echo $t->filtrarP($criterio,$campo);

        }else{
            print $t->popup2();
        }
     
?>
</body>
</html>