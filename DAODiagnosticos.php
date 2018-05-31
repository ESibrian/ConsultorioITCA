<?php

include "interfaz.php";
include "../credenciales.php";
include "diagnostico.php";

class DAODiagnosticos implements Metodos

	{
		
	private $con;
	public function DAODiagnosticos()
	{
		$this->con= new mysqli(SERVIDOR,USUARIO,CONTRA,BD);
		if($this->con->connect_errno){
			echo "Error al conectar a la base de datos: ". $this->con->error;
			exit;
		}


	}

	public function insertar($cit){

	$sql="Insert into diagnosticos values('',".$cit->getId_Exp().",'".$cit->getDescripcion()."','".$cit->getMedicamentos()."','".$cit->getPresion()."','".$cit->getAltura()."','".$cit->getPeso()."','".$cit->getDiag_Corto()."','".$cit->getFecha_Diag()."'
			,'".$cit->getHora()."')";

	$sql1="update Cita as a
	inner join Paciente  as b on a.Id_Paciente=b.Id_Paciente
	inner join  Expediente as c on b.Id_Paciente=c.Id_Paciente
	inner join Diagnosticos as d on c.id_Exp=d.Id_exp
	set a.Estado='Realizada'
	where c.Id_Exp=".$cit->getId_Exp();

			$this->con->query($sql);
			$this->con->query($sql1);

			if ($this->con->error) {
				//echo "Ocurrio un error(".$this->con->error.")";
				//return false;
			}else{

				return true;
			}


	}



	public function eliminar($id){

		$sql="delete  from diagnosticos where Id_Diagnostico=$id;";
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
		$sql="select * from diagnosticos";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=1px>
					<tr class='danger'>
						<th>ID de diagnostico</th>
						<th>ID de Expediente</th>
						<th>Descripcion</th>
						<th>Medicamentos</th>
						<th>Presion</th>
						<th>Altura</th>
						<th>Peso</th>
						<th>Diagnostico Corto</th>
						<th>Opciones</th>
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td>".$fila['Id_Diagnostico']."</td>
					<td>".$fila['Id_Exp']."</td>
					<td>".$fila['Descripcion']."</td>
					<td>".$fila['Medicamentos']."</td>
					<td>".$fila['Presion']."</td>
					<td>".$fila['Altura']."</td>
					<td>".$fila['Peso']."</td>
					<td>".$fila['Diag_Corto']."</td>
					
<td><a href=\"javascript:cargar('".$fila['Id_Diagnostico']."','".$fila['Id_Exp']."','".$fila['Descripcion']."','".$fila['Medicamentos']."','".$fila['Presion']."','".$fila['Altura']."','".$fila['Peso']."','".$fila['Diag_Corto']."');\"><input type='submit' name='btnSelec' class='btn btn-primary' value='Seleccionar'></a></td>

				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}

	public function paraSelect(){
		$select=null;
		$sql="select DISTINCT Diag_Corto from diagnosticos";

		$res= $this->con->query($sql);
      
		while ($valores=$res->fetch_assoc()) {
			$select.="<option value='".$valores['Diag_Corto']."'>".$valores['Diag_Corto']."</option>";
		}
		$select.="
		<option value='Otro'>Otro</option></select></label>

		";


		return $select;


	}

	
	public function modificar($cit){
		$sql="update diagnosticos set Descripcion ='".$cit->getDescripcion()."',Medicamentos='".$cit->getMedicamentos()."',Presion='".$cit->getPresion()."',Altura='".$cit->getAltura()."',Peso='".$cit->getPeso()."',Diag_Corto='".$cit->getDiag_Corto()."' where Id_Diagnostico =".$cit->getId_Diagnostico();
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
		$sql="select * from diagnosticos where $campo like '$criterio'";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=1px>
					<tr class='danger'>
						<th>ID de diagnostico</th>
						<th>ID de Expediente</th>
						<th>Descripcion</th>
						<th>Medicamentos</th>
						<th>Presion</th>
						<th>Altura</th>
						<th>Peso</th>
						<th>Diagnostico Corto</th>
						<th>Opciones</th>
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td>".$fila['Id_Diagnostico']."</td>
					<td>".$fila['Id_Exp']."</td>
					<td>".$fila['Descripcion']."</td>
					<td>".$fila['Medicamentos']."</td>
					<td>".$fila['Presion']."</td>
					<td>".$fila['Altura']."</td>
					<td>".$fila['Peso']."</td>
					<td>".$fila['Diag_Corto']."</td>
					
<td><a href=\"javascript:cargar('".$fila['Id_Diagnostico']."','".$fila['Id_Exp']."','".$fila['Descripcion']."','".$fila['Medicamentos']."','".$fila['Presion']."','".$fila['Altura']."',,'".$fila['Peso']."','".$fila['Diag_Corto']."');\"><input type='submit' name='btnSelec' class='btn btn-primary' value='Seleccionar'></a></td>

				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}

	public function popup2(){
		$dataTable=null;
		$sql="select * from diagnosticos";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=1px>
					<tr class='danger'>
						<th>ID de diagnostico</th>
						<th>ID de Expediente</th>
						<th>Descripcion</th>
						<th>Medicamentos</th>
						<th>Presion</th>
						<th>Altura</th>
						<th>Peso</th>
						<th>Diagnostico Corto</th>
						<th>Opciones</th>
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td>".$fila['Id_Diagnostico']."</td>
					<td>".$fila['Id_Exp']."</td>
					<td>".$fila['Descripcion']."</td>
					<td>".$fila['Medicamentos']."</td>
					<td>".$fila['Presion']."</td>
					<td>".$fila['Altura']."</td>
					<td>".$fila['Peso']."</td>
					<td>".$fila['Diag_Corto']."</td>
					
<td><a href=\"javascript:cargar('".$fila['Id_Exp']."');\"><input type='submit' name='btnSelec' class='btn btn-primary' value='Seleccionar'></a></td>

				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}
	public function historialU($id){
		$dataTable=null;
		$sql="select Descripcion,Medicamentos,Presion,Altura,Peso,Diag_Corto,fecha_Diag,Hora from Diagnosticos where Fecha_Diag=(Select MAX(Fecha_Diag) from diagnosticos where Id_Exp=".$id.") and Id_Exp=".$id;

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=1px>
					<tr class='danger'>
						<th><center>Descripcion</th>
						<th><center>Medicamentos</th>
						<th><center>Presion</th>
						<th><center>Altura</th>
						<th><center>Peso</th>
						<th><center>Diagnostico Corto</th>
						<th><center>Fecha</th>
						<th><center>Hora</th>

					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr bgcolor='white'>
					<td align='center'>".$fila['Descripcion']."</td>
					<td align='center'>".$fila['Medicamentos']."</td>
					<td align='center'>".$fila['Presion']."</td>
					<td align='center'>".$fila['Altura']."</td>
					<td align='center'>".$fila['Peso']."</td>
					<td align='center'>".$fila['Diag_Corto']."</td>
					<td align='center'>".$fila['fecha_Diag']."</td>
					<td align='center'>".$fila['Hora']."</td>
					
					

				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}


	public function historial($id){
		$dataTable=null;
		$sql="Select * from diagnosticos where Id_Exp=".$id;

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=1px>
					<tr class='danger'>
						<th><center>Descripcion</th>
						<th><center>Medicamentos</th>
						<th><center>Presion</th>
						<th><center>Altura</th>
						<th><center>Peso</th>
						<th><center>Diagnostico Corto</th>
						<th><center>Fecha</th>
						<th><center>Hora</th>
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr bgcolor='white'>
					<td align='center'>".$fila['Descripcion']."</td>
					<td align='center'>".$fila['Medicamentos']."</td>
					<td align='center'>".$fila['Presion']."</td>
					<td align='center'>".$fila['Altura']."</td>
					<td align='center'>".$fila['Peso']."</td>
					<td align='center'>".$fila['Diag_Corto']."</td>
					<td  align='center'>".$fila['Fecha_Diag']."</td>
					<td align='center'>".$fila['Hora']."</td>
					
					

				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;

	}


	public function filtrarRE($criterio,$campo){
		$dataTable=null;
		$sql="select * from diagnosticos where $campo like '%$criterio%'";
		
		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=1px>
					<tr class='danger'>
						<th><center>Carnet</th>
						<th><center>Nombre</th>
						<th><center>Cargo</th>
						<th>Salario</th>
						
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td>".$fila['carnet']."</td>
					<td>".$fila['nombre']."</td>
					<td>".$fila['cargo']."</td>
					<td>".$fila['salario']."</td>
					

				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	

 





}

}




	


?>