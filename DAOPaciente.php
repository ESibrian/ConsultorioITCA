<?php

include "interfaz.php";
include "../credenciales.php";
include "paciente.php";

class DAOPaciente implements Metodos

	{
		
	private $con;
	public function DAOPaciente()
	{
		$this->con= new mysqli(SERVIDOR,USUARIO,CONTRA,BD);
		if($this->con->connect_errno){
			echo "Error al conectar a la base de datos: ". $this->con->error;
			exit;
		}


	}

	public function insertar($cit){

			$sql="Insert into paciente values('','".$cit->getNombre()."','".$cit->getDomicilio()."','".$cit->getTelefono()."','".$cit->getfecha_nac()."','".$cit->getestado()."')";

			$this->con->query($sql);

			if ($this->con->error) {
				echo "Ocurrio un error(".$this->con->error.")";
				return false;
			}else{

				return true;
			}


	}
	public function eliminar($id){

		$sql="delete  from paciente where Id_Paciente=$id;";
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
		$sql="select * from paciente where estado='sin';";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=1px>
					<tr class='danger' align='center'>
						
						<th><center>ID de Paciente</th>
						<th><center>Nombre</th>
						<th><center>Domicilio</th>
						<th><center>Telefono</th>
						<th><center>Fecha de nacimiento</th>
						<th><center>Seleccionar</th>
						<th><center>Crear Expediente</th>
						
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td align='center'>".$fila['Id_Paciente']."</td>
					<td align='center'>".$fila['Nombre']."</td>
					<td align='center'>".$fila['Domicilio']."</td>
					<td align='center'>".$fila['Telefono']."</td>
					<td align='center'>".$fila['fecha_nac']."</td>
					
<td align='center'><a href=\"javascript:cargar('".$fila['Id_Paciente']."','".$fila['Nombre']."','".$fila['Domicilio']."','".$fila['Telefono']."','".$fila['fecha_nac']."');\">
<img src='../imagenes/choose.png' align='center' width='30' height='30'></a></td>
<td align='center'>

	<a href='../expediente/vistaExpediente2.php?Id_Paciente=$fila[Id_Paciente]&&Nombre=$fila[Nombre]'><img src='../imagenes/exp.png' align='center' width='30' height='30'></a>
</td>

				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}
	public function modificar($cit){
		$sql="update paciente set Nombre='".$cit->getNombre()."',Domicilio='".$cit->getDomicilio()."',Telefono='".$cit->getTelefono()."',fecha_nac='".$cit->getfecha_nac()."' where Id_Paciente =".$cit->getId_Paciente();
		$this->con->query($sql);

			if ($this->con->error) {
				echo "Ocurrio un error(".$this->con->error.")";
				return false;
			}else{

				return true;
			}


	}
	public function modificarp($cit){
		$sql="update paciente set estado='con' where Id_Paciente=".$cit->getId_paciente();
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
		$sql="select * from paciente where $campo like '%$criterio%' and estado='sin'";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=1px>
					<tr class='danger'>
						<th><center>ID de Paciente</th>
						<th><center>Nombre</th>
						<th><center>Domicilio</th>
						<th><center>Telefono</th>
						<th><center>Fecha de nacimiento</th>
						<th><center>Opciones</th>
						<th><center>Acciones</th>
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td align='center'>".$fila['Id_Paciente']."</td>
					<td align='center'>".$fila['Nombre']."</td>
					<td align='center'>".$fila['Domicilio']."</td>
					<td align='center'>".$fila['Telefono']."</td>
					<td>".$fila['fecha_nac']."</td>
					
<td align='center'><a href=\"javascript:cargar('".$fila['Id_Paciente']."','".$fila['Nombre']."','".$fila['Domicilio']."','".$fila['Telefono']."','".$fila['fecha_nac']."');\"><input type='submit' name='btnSelec' class='btn btn-primary' value='Seleccionar'></a></td>
<td><a href='../expediente/vistaExpediente2.php?Id_Paciente=$fila[Id_Paciente]'><input type='submit' name='btnSelec' class='btn btn-primary' value='Crear Expediente'></a></td>

				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;

	}

		public function filtrarPa($criterio,$campo){
		$dataTable=null;
		$sql="select * from paciente where $campo like '%$criterio%'";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=1px>
					<tr class='danger'>
						<th><center>ID de Paciente</th>
						<th><center>Nombre</th>
						<th><center>Domicilio</th>
						<th><center>Telefono</th>
						<th><center>Fecha de nacimiento</th>
						
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr bgcolor='white'>
					<td align='center'>".$fila['Id_Paciente']."</td>
					<td align='center'>".$fila['Nombre']."</td>
					<td align='center'>".$fila['Domicilio']."</td>
					<td align='center'>".$fila['Telefono']."</td>
					<td align='center'>".$fila['fecha_nac']."</td>
					


				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;

	}

	public function mostrar(){
		$dataTable=null;
		$sql="select * from paciente";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=1px>
					<tr class='danger'>
						<th><center>ID de Paciente</th>
						<th><center>Nombre</th>
						<th><center>Domicilio</th>
						<th><center>Telefono</th>
						<th><center>Fecha de nacimiento</th>
						
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr bgcolor='white'>
					<td align='center'>".$fila['Id_Paciente']."</td>
					<td align='center'>".$fila['Nombre']."</td>
					<td align='center'>".$fila['Domicilio']."</td>
					<td align='center'>".$fila['Telefono']."</td>
					<td align='center'>".$fila['fecha_nac']."</td>
					


				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;

	}

 





}




	


?>