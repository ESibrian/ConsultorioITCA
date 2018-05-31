<?php

include "interfaz.php";
include "../credenciales.php";
include "Expedientes.php";
include "../paciente/paciente.php";

class DAOExpedientes implements Metodos

	{
		
	private $con;
	public function DAOExpedientes()
	{
		$this->con= new mysqli(SERVIDOR,USUARIO,CONTRA,BD);
		if($this->con->connect_errno){
			echo "Error al conectar a la base de datos: ". $this->con->error;
			exit;
		}


	}

	public function insertar($cit){

			$sql="Insert into expediente values('','".$cit->getId_paciente()."','".$cit->getTipo_Sangre()."','".$cit->getNum_Seguro()."')";
			$sql1="update paciente set estado='con' where Id_Paciente=".$cit->getId_Paciente();
			$this->con->query($sql);
			$this->con->query($sql1);

			if ($this->con->error) {
				echo "Ocurrio un error(".$this->con->error.")";
				return false;
			}else{

				return true;
			}


	}
	public function eliminar($id){

		$sql="delete  from expediente where Id_Exp=$id;";
		$this->con->query($sql);

			if ($this->con->error) {
				echo "Ocurrio un error(".$this->con->error.")";
				return false;
			}else{

				return true;
			}

	}
	public function seleccionar(){
		$dataTable=null;
		$sql="select a.Id_Exp, a.Id_Paciente,b.Nombre, a.Tipo_Sangre, a.Num_Seguro from Expediente as a
inner join Paciente as b on a.Id_Paciente=b.Id_Paciente";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=1px>
					<tr class='danger'>
						<th><center>ID de Expediente</th>
						<th><center>ID de Paciente</th>
						<th><center>Nombre</th>
						<th><center>Tipo de Sangre</th>
						<th><center>Numero de Seguro</th>
						<th><center>Opciones</th>
						
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td align='center'>".$fila['Id_Exp']."</td>
					<td align='center'>".$fila['Id_Paciente']."</td>
					<td align='center'>".$fila['Nombre']."</td>
					<td align='center'>".$fila['Tipo_Sangre']."</td>
					<td align='center'>".$fila['Num_Seguro']."</td>
					<td align='center'><a href=\"javascript:cargar('".$fila['Id_Exp']."','".$fila['Id_Paciente']."','".$fila['Tipo_Sangre']."','".$fila['Num_Seguro']."');\"><img src='../imagenes/choose.png' align='center' width='30' height='30'></a></td>
				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}
	public function modificar($cit){
		$sql="update Expediente set Tipo_Sangre='".$cit->getTipo_Sangre()."',Num_Seguro='".$cit->getNum_Seguro()."' where Id_Exp =".$cit->getId_Exp();
		$this->con->query($sql);

			if ($this->con->error) {
				echo "Ocurrio un error(".$this->con->error.")";
				return false;
			}else{

				return true;
			}


	}

	public function modificarp($cit){
		$sql="update paciente set estado='con' where Id_Paciente=".$cit->getId_Paciente();
				$this->con->query($sql);
		
			if ($this->con->error) {
				echo "Ocurrio un error(".$this->con->error.")";
				return false;
			}else{

				return true;
			}


	}

	public function liberar(){

		$this->con->close();
	}


	public function filtrar($criterio,$campo){
		$dataTable=null;
		$sql="select a.Id_Exp, a.Id_Paciente,b.Nombre, a.Tipo_Sangre, a.Num_Seguro from Expediente as a
inner join Paciente as b on a.Id_Paciente=b.Id_Paciente where $campo like '%$criterio%'";

		
		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=1px>
					<tr class='danger'>
						<th><center>ID de Expediente</th>
						<th><center>ID de Paciente</th>
						<th><center>Nombre de Paciente</th>
						<th><center>Tipo de Sangre</th>
						<th><center>Numero de Seguro</th>
						
						<th>Opciones</th>
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td align='center'>".$fila['Id_Exp']."</td>
					<td align='center'>".$fila['Id_Paciente']."</td>
					<td align='center'>".$fila['Nombre']."</td>
					<td align='center'>".$fila['Tipo_Sangre']."</td>
					<td align='center'>".$fila['Num_Seguro']."</td>
					
					
<td align='center'><a href=\"javascript:cargar('".$fila['Id_Exp']."','".$fila['Id_Paciente']."','".$fila['Tipo_Sangre']."','".$fila['Num_Seguro']."');\"><img src='../imagenes/choose.png' align='center' width='30' height='30'></a></td>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}

		public function popup2(){
		$dataTable=null;
		$sql="select a.Id_Exp, a.Id_Paciente,b.Nombre, a.Tipo_Sangre, a.Num_Seguro from Expediente as a
inner join Paciente as b on a.Id_Paciente=b.Id_Paciente";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=1px>
					<tr class='danger'>
						<th><center>ID de Expediente</th>
						<th><center>ID de Paciente</th>
						<th><center>Nombre de Paciente</th>
						<th><center>Tipo de Sangre</th>
						<th><center>Numero de Seguro</th>
						
						<th>Opciones</th>
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td>".$fila['Id_Exp']."</td>
					<td>".$fila['Id_Paciente']."</td>
					<td>".$fila['Nombre']."</td>
					<td>".$fila['Tipo_Sangre']."</td>
					<td>".$fila['Num_Seguro']."</td>
					
					
<td><a href=\"javascript:cargar('".$fila['Id_Paciente']."');\"><input type='submit' name='btnSelec' class='btn btn-primary' value='Seleccionar'></a></td>

				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}


	public function filtrar2($criterio,$campo){
		$dataTable=null;
		$sql="select * from Expediente where $campo like '$criterio'";

		
		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=1px>
					<tr class='danger'>
						<th><center>ID de Expediente</th>
						<th><center>ID de Paciente</th>
						<th><center>Tipo de Sangre</th>
						<th><center>Numero de Seguro</th>
						
						<th>Opciones</th>
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td>".$fila['Id_Exp']."</td>
					<td>".$fila['Id_Paciente']."</td>
					<td>".$fila['Tipo_Sangre']."</td>
					<td>".$fila['Num_Seguro']."</td>
					
					
<td><a href=\"javascript:cargar('".$fila['Id_Paciente']."');\"><input type='submit' name='btnSelec' class='btn btn-primary' value='Seleccionar'></a></td>

				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}

 





}




	


?>