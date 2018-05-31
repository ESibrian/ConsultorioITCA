<?php

include "interfaz.php";
include "../credenciales.php";
include "citas.php";

class DAOCitas implements Metodos

	{
		
	private $con;
	public function DAOCitas()
	{
		$this->con= new mysqli(SERVIDOR,USUARIO,CONTRA,BD);
		if($this->con->connect_errno){
			echo "Error al conectar a la base de datos: ". $this->con->error;
			exit;
		}


	}

	public function insertar($cit){

			$sql="Insert into Cita values('','".$cit->getId_paciente()."','".$cit->getFecha()."','".$cit->getJornada()."','".$cit->getEstado()."')";

			$this->con->query($sql);

			if ($this->con->error) {
				echo "<script>alert('Paciente no registrado');</script>";
				
			}else{

				return true;
			}


	}



	public function eliminar($id){

		$sql="delete  from Cita where Id_cita=$id;";
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
		$sql="select a.Id_cita, a.Id_Paciente,b.Nombre, a.Fecha, a.Jornada from Cita as a
inner join Paciente as b on a.Id_paciente=b.Id_Paciente order by Id_cita";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=2px>
					<tr class='info'>
						<th><center>ID de Cita</th>
						<th>ID de Paciente</th>
						<th><center>Nombre</th>
						<th><center>Fecha</th>
						<th><center>Jornada</th>
						
						<th><center>Opciones</th>
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td>".$fila['Id_cita']."</td>
					<td>".$fila['Id_Paciente']."</td>
					<td>".$fila['Nombre']."</td>
					<td>".$fila['Fecha']."</td>
					<td>".$fila['Jornada']."</td>
					
					
<td><a href=\"javascript:cargar('".$fila['Id_cita']."','".$fila['Id_Paciente']."','".$fila['Fecha']."','".$fila['Jornada']."');\"><img src='../imagenes/choose.png' align='center' width='30' height='30'></a></td>

				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}
	public function seleccionarD(){
		$dataTable=null;
		$sql="select b.Nombre,c.Id_Exp, a.Fecha, a.Jornada from Cita as a 
inner join Paciente as b on a.Id_paciente=b.Id_Paciente
inner join Expediente as c on c.Id_paciente=b.Id_paciente  where a.fecha=curdate() AND a.Estado='Pendiente' ORDER BY Jornada, a.Id_cita";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=2px>
					<tr class='danger' >
						
						<th><center>Nombre</th>
						<th><center>ID de Expediente</th>
						<th><center>Fecha</th>
						<th><center>Jornada</th>
						<th><center>Seleccionar</th>

					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					
					<td align='center'>".$fila['Nombre']."</td>
					<td align='center'>".$fila['Id_Exp']."</td>
					<td align='center'>".$fila['Fecha']."</td>
					<td align='center'>".$fila['Jornada']."</td>
					
<td align='center'><a href='../diagnostico/vistaDiagnostico2.php?Id_Exp=$fila[Id_Exp]&&Nombre=$fila[Nombre]&&fecha=$fila[Fecha]'><img src='../imagenes/choose.png' align='center' width='30' height='30'></a></td>

				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}

		public function seleccionarCitas(){
		$dataTable=null;
		$sql="select a.Id_cita,b.Nombre,b.Id_paciente,c.Id_Exp, a.Fecha, a.Jornada from Cita as a 
inner join Paciente as b on a.Id_paciente=b.Id_Paciente
inner join Expediente as c on c.Id_paciente=b.Id_paciente  where  a.Estado='Pendiente' ORDER BY Jornada, a.Fecha";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=2px>
					<tr class='danger'>
						
						<th><center>Id de cita</th>
						<th><center>Id De Paciente</th>
						<th><center>Nombre</th>
						<th><center>ID de Expediente</th>
						<th>Fecha</th>
						<th><center>Jornada</th>
						<th><center>Seleccionar</th>
						<th><center>Constancia de Cita</th>

					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td align='center'>".$fila['Id_cita']."</td>
					<td align='center'>".$fila['Id_paciente']."</td>
					<td align='center'>".$fila['Nombre']."</td>
					<td align='center'>".$fila['Id_Exp']."</td>
					<td align='center'>".$fila['Fecha']."</td>
					<td align='center'>".$fila['Jornada']."</td>
					
<td align='center'><a href=\"javascript:cargar('".$fila['Id_cita']."','".$fila['Id_paciente']."','".$fila['Fecha']."','".$fila['Jornada']."');\"><img src='../imagenes/choose.png' align='center' width='30' height='30'></a></td>
<td align='center'><a href='reporteConstanciaC.php?&&Nombre=$fila[Nombre]&&fecha=$fila[Fecha]' target='_blank'><img src='../imagenes/report.png' align='center' width='30' height='30'></a></td>

				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}

	public function seleccionarSe(){
		$dataTable=null;
		$sql="select b.Nombre,c.Id_Exp, a.Fecha, a.Jornada from Cita as a 
inner join Paciente as b on a.Id_paciente=b.Id_Paciente
inner join Expediente as c on c.Id_paciente=b.Id_paciente  where a.fecha=curdate() AND a.Estado='Pendiente' ORDER BY Jornada, a.Id_cita";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=2px width='1000'>
					<tr class='danger'>
						
						<th><center>Nombre</th>
						<th><center>ID de Expediente</th>
						<th><center>Fecha</th>
						<th><center>Jornada</th>
						

					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					
					<td align='center'>".$fila['Nombre']."</td>
					<td align='center'>".$fila['Id_Exp']."</td>
					<td align='center'>".$fila['Fecha']."</td>
					<td align='center'>".$fila['Jornada']."</td>
					


				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}
		public function filtrarC($criterio,$campo){
		$dataTable=null;
		$sql="select a.Id_cita, a.Id_paciente,b.Nombre,c.Id_Exp, a.Fecha, a.Jornada from Cita as a
inner join Paciente as b on a.Id_paciente=b.Id_Paciente
inner join Expediente as c on c.Id_paciente=b.Id_paciente where $campo like '%$criterio%' AND a.Estado='Pendiente'";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=2px>
					<tr class='danger'>
						
						<th><center>Id de cita</th>
						<th><center>Id De Paciente</th>
						<th><center>Nombre</th>
						<th><center>ID de Expediente</th>
						<th><center>Fecha</th>
						<th><center>Jornada</th>
						<th><center>Seleccionar</th>
						<th><center>Constancia de Cita</th>

					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td align='center'>".$fila['Id_cita']."</td>
					<td align='center'>".$fila['Id_paciente']."</td>
					<td align='center'>".$fila['Nombre']."</td>
					<td align='center'>".$fila['Id_Exp']."</td>
					<td align='center'>".$fila['Fecha']."</td>
					<td align='center'>".$fila['Jornada']."</td>	
<td align='center'><a href=\"javascript:cargar('".$fila['Id_cita']."','".$fila['Id_paciente']."','".$fila['Fecha']."','".$fila['Jornada']."');\"><img src='../imagenes/choose.png' align='center' width='30' height='30'></a></td>
<td align='center'><a href='reporteConstanciaC.php?&&Nombre=$fila[Nombre]&&fecha=$fila[Fecha]' target='_blank'><img src='../imagenes/report.png' align='center' width='30' height='30'></a></td>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}
			public function filtrarCD($criterio,$campo){
		$dataTable=null;
		$sql="select a.Id_cita, a.Id_paciente,b.Nombre,c.Id_Exp, a.Fecha, a.Jornada from Cita as a
inner join Paciente as b on a.Id_paciente=b.Id_Paciente
inner join Expediente as c on c.Id_paciente=b.Id_paciente where $campo like '%$criterio%' AND a.Estado='Pendiente'";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=2px>
					<tr class='danger'>
						
						<th><center>Id de cita</th>
						<th><center>Id De Paciente</th>
						<th><center>Nombre</th>
						<th><center>ID de Expediente</th>
						<th><center>Fecha</th>
						<th><center>Jornada</th>
						<th><center>Opciones</th>
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td align='center'>".$fila['Id_cita']."</td>
					<td align='center'>".$fila['Id_paciente']."</td>
					<td align='center'>".$fila['Nombre']."</td>
					<td align='center'>".$fila['Id_Exp']."</td>
					<td align='center'>".$fila['Fecha']."</td>
					<td align='center'>".$fila['Jornada']."</td>	
<td align='center'><a href='../diagnostico/vistaDiagnostico2.php?Id_Exp=$fila[Id_Exp]&&Nombre=$fila[Nombre]&&fecha=$fila[Fecha]'><img src='../imagenes/choose.png' align='center' width='30' height='30'></a></td>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}

	public function filtrarH($criterio,$campo){
		$dataTable=null;
		$sql="select a.Id_cita, a.Id_Paciente,b.Nombre,c.Id_Exp, a.Fecha, a.Jornada from Cita as a
inner join Paciente as b on a.Id_paciente=b.Id_Paciente
inner join Expediente as c on c.Id_paciente=b.Id_paciente where $campo like '%$criterio%' AND a.Estado='Realizada'";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=2px>
					<tr class='danger'>
						<th><center>ID de Cita</th>
						<th><center>ID de Paciente</th>
						<th><center>Nombre</th>
						<th><center>ID de Expediente</th>
						<th><center>Fecha</th>
						<th><center>Jornada</th>
						
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr bgcolor='white'>
					<td align='center'>".$fila['Id_cita']."</td>
					<td align='center'>".$fila['Id_Paciente']."</td>
					<td align='center'>".$fila['Nombre']."</td>
					<td align='center'>".$fila['Id_Exp']."</td>
					<td align='center'>".$fila['Fecha']."</td>
					<td align='center'>".$fila['Jornada']."</td>				

			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}

	public function modificar($cit){
		$sql="update Cita set Id_cita='".$cit->getId_cita()."',Id_paciente='".$cit->getId_paciente()."',Fecha='".$cit->getFecha()."',Jornada='".$cit->getJornada()."' where Id_cita =".$cit->getId_cita();
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
		$sql="select * from Cita where $campo like '$criterio'";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=2px>
					<tr class='danger'>
						<th><center>Id_cita</th>
						<th><center>Id_paciente</th>
						<th><center>Fecha</th>
						<th><center>Jornada</th>
						<th><center>Estado</th>
						<th><center>Seleccionar</th>
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td align='center'>".$fila['Id_cita']."</td>
					<td align='center'>".$fila['Id_Paciente']."</td>
					<td align='center'>".$fila['Fecha']."</td>
					<td align='center'>".$fila['Jornada']."</td>
					<td align='center'>".$fila['Estado']."</td>
					<td align='center'><a href=\"javascript:cargar('".$fila['Id_cita']."','".$fila['Id_Paciente']."','".$fila['Fecha']."','".$fila['Hora']."','".$fila['Estado']."');\"><img src='../imagenes/choose.png' align='center' width='30' height='30'></a></td>

				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}

		public function popup2(){
		$dataTable=null;
		$sql="select * from paciente where estado='con'";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=2px>
					<tr class='danger'>
						<th><center>ID de Paciente</th>
						<th><center>Nombre</th>
						<th><center>Domicilio</th>
						<th><center>Telefono</th>
						<th><center>Fecha de nacimiento</th>
						<th><center>Seleccionar</th>
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td align='center'>".$fila['Id_Paciente']."</td>
					<td align='center'>".$fila['Nombre']."</td>
					<td align='center'>".$fila['Domicilio']."</td>
					<td align='center'>".$fila['Telefono']."</td>
					<td align='center'>".$fila['fecha_nac']."</td>
					
<td align='center'><a href=\"javascript:cargar('".$fila['Id_Paciente']."');\"><img src='../imagenes/choose.png' align='center' width='30' height='30'></a></td>

				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}
		public function filtrarP($criterio,$campo){
		$dataTable=null;
		$sql="select * from Paciente where $campo like '%$criterio%'";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=2px>
					<tr class='danger'>
						<th><center>ID de Paciente</th>
						<th><center>Nombre</th>
						<th><center>Domicilio</th>
						<th><center>Telefono</th>
						<th><center>Fecha de nacimiento</th>
						<th><center>Opciones</th>
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td align='center'>".$fila['Id_Paciente']."</td>
					<td align='center'>".$fila['Nombre']."</td>
					<td align='center'>".$fila['Domicilio']."</td>
					<td align='center'>".$fila['Telefono']."</td>
					<td align='center'>".$fila['fecha_nac']."</td>
					
<td align='center'><a href=\"javascript:cargar('".$fila['Id_Paciente']."');\"><img src='../imagenes/choose.png' align='center' width='30' height='30'></a></td>

				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}

	public function popup2C(){
		$dataTable=null;
		$sql="select b.Nombre,c.Id_Exp, a.Fecha, a.Jornada from Cita as a 
inner join Paciente as b on a.Id_paciente=b.Id_Paciente
inner join Expediente as c on c.Id_paciente=b.Id_paciente where  a.Estado='Realizada' and b.estado='con' ORDER BY  a.Id_cita";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-sucess' border=2px>
					<tr class='danger'>
						
						<th><center>Nombre</th>
						<th><center>ID de Expediente</th>
						<th><center>Fecha</th>
						<th><center>Jornada</th>
						
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr bgcolor='white'>
					
					<td align='center'>".$fila['Nombre']."</td>
					<td align='center'>".$fila['Id_Exp']."</td>
					<td align='center'>".$fila['Fecha']."</td>
					<td align='center'>".$fila['Jornada']."</td>
					


				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}

	public function Opcion(){
		$dataTable=null;
		$sql="select * from Roles";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-danger' border=2px width='100'>
					<tr class='danger'>
						<th><center>ID de Usuario</th>
						<th><center>Nombres</th>
						<th><center>Apellidos</th>
						<th><center>Telefono</th>
						<th><center>Username</th>
						<th><center>Contraseña</th>
						<th><center>Nivel de Acceso</th>
						<th><center>Seleccionar</th>
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td align='center'>".$fila['Id_Rol']."</td>
					<td align='center'>".$fila['Nombre']."</td>
					<td align='center'>".$fila['Apellido']."</td>
					<td align='center'>".$fila['Telefono']."</td>
					<td align='center'>".$fila['Username']."</td>
					<td align='center'>".$fila['Pass']."</td>
					<td align='center'>".$fila['nivel_acc']."</td>
					
<td align='center'><a href=\"javascript:cargar('".$fila['Id_Rol']."','".$fila['Nombre']."','".$fila['Apellido']."','".$fila['Telefono']."','".$fila['Username']."','".$fila['Pass']."','".$fila['nivel_acc']."');\"><img src='../imagenes/choose.png' align='center' width='30' height='30'></a></td>

				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}


	public function insertarUs($cit){

			$sql="Insert into Roles values('','".$cit->getNombre()."','".$cit->getApellido()."','".$cit->getTelefono()."','".$cit->getUsername()."','".$cit->getPass()."','".$cit->getnivel_acc()."')";

			$this->con->query($sql);

			if ($this->con->error) {
				echo "Ocurrio un error(".$this->con->error.")";
				return false;
			}else{

				return true;
			}


	}


	public function eliminarUs($id){

		$sql="delete  from Roles where Id_Rol=$id;";
		$this->con->query($sql);

			if ($this->con->error) {
				echo "Ocurrio un error(".$this->con->error.")";
				return false;
			}else{

				return true;
			}

	}

	public function modificarUS($cit){
		$sql="update Roles set Nombre='".$cit->getNombre()."',Apellido='".$cit->getApellido()."',Telefono='".$cit->getTelefono()."'
		,Username='".$cit->getUsername()."',Pass='".$cit->getPass()."',nivel_acc='".$cit->getnivel_acc()."' where Id_Rol =".$cit->getId_Rol();
		$this->con->query($sql);

			if ($this->con->error) {
				echo "Ocurrio un error(".$this->con->error.")";
				return false;
			}else{

				return true;
			}


	}


	public function filtrarUs($criterio,$campo){
		$dataTable=null;
		$sql="select * from Roles where $campo like '%$criterio%'";

		$res= $this->con->query($sql);

		$dataTable.="<table  class='table table-danger' border=1px>
					<tr class='danger'>
						<th><center>ID de Usuario</th>
						<th><center>Nombres</th>
						<th><center>Apellidos</th>
						<th><center>Telefono</th>
						<th><center>Username</th>
						<th><center>Contraseña</th>
						<th><center>Nivel de Acceso</th>
						<th><center>Seleccionar</th>
					</tr>";
		while($fila=$res->fetch_assoc()){
			$dataTable.="
				<tr>
					<td align='center'>".$fila['Id_Rol']."</td>
					<td align='center'>".$fila['Nombre']."</td>
					<td align='center'>".$fila['Apellido']."</td>
					<td align='center'>".$fila['Telefono']."</td>
					<td align='center'>".$fila['Username']."</td>
					<td align='center'>".$fila['Pass']."</td>
					<td align='center'>".$fila['nivel_acc']."</td>
					
<td align='center'><a href=\"javascript:cargar('".$fila['Id_Rol']."','".$fila['Nombre']."','".$fila['Apellido']."','".$fila['Telefono']."','".$fila['Username']."','".$fila['Pass']."','".$fila['nivel_acc']."');\"><img src='../imagenes/choose.png' align='center' width='30' height='30'></a></td>

				</tr>
			";
		}
		$dataTable.="</table>";
		return $dataTable;


	}



 





}




	


?>