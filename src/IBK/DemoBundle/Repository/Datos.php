<?php

namespace IBK\DemoBundle\Repository;


class Datos
{
	private function getJson(){
		$json = file_get_contents("../src/IBK/DemoBundle/Repository/datos.json");
		$datos = json_decode($json, true);
		return $datos; 
	}

	public function getRegiones(){
		$datos = $this->getJson();
		return $datos["region"]; 
	}

	public function getComunas($region){
		$datos = $this->getJson();
		return $datos["comuna"][$region]; 
	}

	public function getEducacion(){
		$datos = $this->getJson();
		return $datos["educacion"]; 
	}

	public function getCivil(){
		$datos = $this->getJson();
		return $datos["estado_civil"]; 
	}

	public function getSexo(){
		$datos = $this->getJson();
		return $datos["sexo"]; 
	}

	public function getDomicilio(){
		$datos = $this->getJson();
		return $datos["domicilio"]; 
	}

	public function getEconomia(){
		$datos = $this->getJson();
		return $datos["economia"]; 
	}

	public function getEconomiaConyugue(){
		$datos = $this->getJson();
		return $datos["economia_conyugue"]; 
	}

	public function getRemuneracion(){
		$datos = $this->getJson();
		return $datos["remuneracion"]; 
	}

	public function getContrato(){
		$datos = $this->getJson();
		return $datos["contrato"]; 
	}

	public function getInversion(){
		$datos = $this->getJson();
		return $datos["inversion"]; 
	}

	public function getPropiedad(){
		$datos = $this->getJson();
		return $datos["propiedad"]; 
	}


}