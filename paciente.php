<?php
class Pacientes{
	private $Id_Paciente;
	private $Nombre;
	private $Domicilio;
	private $Telefono;
	private $fecha_nac;
	private $estado;

	 public function Pacientes()
	{
	$this->Id_Paciente=null;
	$this->Nombre=null;
	$this->Domicilio=null;
	$this->Telefono=null;
	$this->fecha_nac=null;
	$this->estado=null;
	}

	 public function setId_Paciente($val)
	{
		$this->Id_Paciente=$val;
	}
	public function setNombre($val)
	{
		$this->Nombre=$val;
	}
	public function setDomicilio($val)
	{
		$this->Domicilio=$val;
	}
	public function setTelefono($val)
	{
		$this->Telefono=$val;
	}
	public function setfecha_nac($val)
	{
		$this->fecha_nac=$val;
	}

	public function setestado($val)
	{
		$this->estado=$val;
	}

	
	 public function getId_Paciente()
	{
		return $this->Id_Paciente;
	}
	 public function getNombre()
	{
		return $this->Nombre;
	}

 public function getDomicilio()
	{
		return $this->Domicilio;
	}

 public function getTelefono()
	{
		return $this->Telefono;
	}

	 public function getfecha_nac()
	{
		return $this->fecha_nac;
	}

	public function getestado()
	{
		return $this->estado;
	}

}


?>