


<?php
session_start();
include 'DAOExpedientes.php';
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
<body>
<form action="#" method="POST">
        <br>Buscar:&nbsp;<input type="text" name="txtCriterio" placeholder="Criterio de busqueda">
        En base a:&nbsp;<select name="campos">

            <option value="Id_Exp">Id de Expediente</option>
            <option value="Id_paciente">Id de Paciente</option>
             <option value="Nombre">Nombre de Paciente</option>
            <option value="Tipo_Sangre">Tipo de sangre</option>
            <option value="Num_Seguro">Numero de seguro</option>
            <option value="Fecha_Consulta">Fecha de consulta</option>
        </select>
        &nbsp;<input type="submit" name="btnFiltro" value="Filtrar" class="btn btn-danger"><br>
        
    </form>

<?php
$t = new DAOExpedientes();


if (isset($_REQUEST["btnFiltro"])) {
   $criterio = $_REQUEST["txtCriterio"];
            $campo= $_REQUEST["campos"];

            echo $t->filtrar($criterio,$campo);

}
else{
     print $t->popup2();
 }


     
?>
</body>
</html>