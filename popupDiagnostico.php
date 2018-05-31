<?php
session_start();
include 'DAODiagnosticos.php';
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
         function cargar(Id_Exp) { 
            window.opener.document.frm.txtIdEx.value=Id_Exp;
             this.window.close();
         }        
	</script>
</head>

<?php
$t = new DAODiagnosticos();

     print $t->popup2();


     
?>
</body>
</html>