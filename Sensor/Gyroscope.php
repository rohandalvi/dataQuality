<?php
require 'Sensor.php';
class Gyroscope extends Sensor {
	
	private $x,$y,$z;
	private $g = 9.81;
	
	public function __construct(){
		
		$this->x = array(min => -($this->$g)*250*0.0001, max=>$this->g*250*0.0001);
		$this->y = array(min => -($this->g)*250*0.0001, max=> $this->g*250*0.0001);
		
		$this->z = array(min => 9.5, max => 9.9);
	}
	
	public function __destruct(){
		$this->x = array();
		$this->y = array();
		$this->z = array();
		
	}
	
	public function getXMax(){
		return $this->x(max);
	}
	
	public function getYMax(){
		return $this->y(max);
	}
	
	public function getZMax(){
		return $this->z(max);
	}
	
	public function getXMin(){
		return $this->x(min);
	}
	
	public function getYMin(){
		return $this->y(min);
	}
	
	public function getZMin(){
		return $this->z(min);
	}
	
}
?>