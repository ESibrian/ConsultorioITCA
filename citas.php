<?php
class Citas{
	private $Estado;
	private $Fecha;
	private $Jornada;
	private $Id_cita;
	private $Id_paciente;
	

	private $Id_Rol;
	private $Nombre;
	private $Apellido;
	private $Telefono;
	private $Username;
	private $Pass;
	private $nivel_acc;


	 public function Citas()
	{
	$this->Estado=null;
	$this->Fecha=null;
	$this->Jornada=null;
	$this->Id_cita=null;
	$this->Id_paciente=null;
	}

	 public function setEstado($val)
	{
		$this->Estado=$val;
	}
	public function setFecha($val)
	{
		$this->Fecha=$val;
	}
	public function setJornada($val)
	{
		$this->Jornada=$val;
	}
	public function setId_cita($val)
	{
		$this->Id_cita=$val;
	}
	public function setId_paciente($val)
	{
		$this->Id_paciente=$val;
	}



	public function setId_Rol($val)
	{
		$this->Id_Rol=$val;
	}
	public function setNombre($val)
	{
		$this->Nombre=$val;
	}
	public function setApellido($val)
	{
		$this->Apellido=$val;
	}
	public function setTelefono($val)
	{
		$this->Telefono=$val;
	}
	public function setUsername($val)
	{
		$this->Username=$val;
	}
	public function setPass($val)
	{
		$this->Pass=$val;
	}
	public function setnivel_acc($val)
	{
		$this->nivel_acc=$val;
	}


	 public function getEstado()
	{
		return $this->Estado;
	}
	 public function getFecha()
	{
		return $this->Fecha;
	}

 public function getJornada()
	{
		return $this->Jornada;
	}

 public function getId_cita()
	{
		return $this->Id_cita;
	}

	 public function getId_paciente()
	{
		return $this->Id_paciente;
	}

	 public function getId_Rol()
	{
		return $this->Id_Rol;
	}
	 public function getNombre()
	{
		return $this->Nombre;
	}
	 public function getApellido()
	{
		return $this->Apellido;
	}
	 public function getTelefono()
	{
		return $this->Telefono;
	}
	
	 public function getUsername()
	{
		return $this->Username;
	}
	 public function getPass()
	{
		return $this->Pass;
	}
	 public function getnivel_acc()
	{
		return $this->nivel_acc;
	}


}


?>