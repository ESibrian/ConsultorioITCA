<?php
class Diagnostico{
	private $Id_Diagnostico;
	private $Id_Exp;
	private $Descripcion;
	private $Medicamentos;
	private $Presion;
	private $Altura;
	private $Peso;
	private $Diag_Corto;
	private $Fecha_Diag;

	 public function Diagnostico()
	{
	$this->Id_Diagnostico=null;
	$this->Id_Exp=null;
	$this->Descripcion=null;
	$this->Medicamentos=null;
	$this->Presion=null;
	$this->Altura=null;
	$this->Diag_Corto=null;
	$this->Fecha_Diag=null;
	$this->Hora=null;
	}

	 public function setId_Diagnostico($val)
	{
		$this->Id_Diagnostico=$val;
	}
	public function setId_Exp($val)
	{
		$this->Id_Exp=$val;
	}
	public function setDescripcion($val)
	{
		$this->Descripcion=$val;
	}
	public function setMedicamentos($val)
	{
		$this->Medicamentos=$val;
	}
	public function setPresion($val)
	{
		$this->Presion=$val;
	}
	public function setAltura($val)
	{
		$this->Altura=$val;
	}
	public function setPeso($val)
	{
		$this->Peso=$val;
	}
	public function setDiag_Corto($val)
	{
		$this->Diag_Corto=$val;
	}

	public function setFecha_Diag($val)
	{
		$this->Fecha_Diag=$val;
	}
	public function setHora($val)
	{
		$this->Hora=$val;
	}


	 public function getId_Diagnostico()
	{
		return $this->Id_Diagnostico;
	}
	 public function getId_Exp()
	{
		return $this->Id_Exp;
	}

 public function getDescripcion()
	{
		return $this->Descripcion;
	}

 public function getMedicamentos()
	{
		return $this->Medicamentos;
	}

	 public function getPresion()
	{
		return $this->Presion;
	}
	 public function getAltura()
	{
		return $this->Altura;
	}
	 public function getPeso()
	{
		return $this->Peso;
	}
	 public function getDiag_Corto()
	{
		return $this->Diag_Corto;
	}

	public function getFecha_Diag()
	{
		return $this->Fecha_Diag;
	}

	public function getHora()
	{
		return $this->Hora;
	}



}


?>