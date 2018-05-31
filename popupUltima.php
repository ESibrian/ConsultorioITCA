<?php
session_start();
include 'DAODiagnosticos.php';

if (isset($_REQUEST["idEx"])) {
    $id=$_REQUEST["idEx"];

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
    
</head>
<body onblur="self.close()">
    <center>
    <h2><B>Ultima Consulta</B></h2>
<?php
$t = new DAODiagnosticos();

     print $t->historialU($id);


     }
?>
</body>
</html>