<?php
class Expedientes{
	private $Id_Exp;
	private $Id_paciente;
	private $Tipo_Sangre;
	private $Num_Seguro;
	private $Fecha_consulta;

	 public function Expedientes()
	{
	$this->Id_Exp=null;
	$this->Id_paciente=null;
	$this->Tipo_Sangre=null;
	$this->Num_Seguro=null;
	$this->Fecha_consulta=null;
	}

	 public function setId_Exp($val)
	{
		$this->Id_Exp=$val;
	}
	public function setId_paciente($val)
	{
		$this->Id_paciente=$val;
	}
	public function setTipo_Sangre($val)
	{
		$this->Tipo_Sangre=$val;
	}
	public function setNum_Seguro($val)
	{
		$this->Num_Seguro=$val;
	}
	


	 public function getId_Exp()
	{
		return $this->Id_Exp;
	}
	 public function getId_paciente()
	{
		return $this->Id_paciente;
	}

 public function getTipo_Sangre()
	{
		return $this->Tipo_Sangre;
	}

public function getNum_Seguro()
	{
		return $this->Num_Seguro;
	}


	



}


?>