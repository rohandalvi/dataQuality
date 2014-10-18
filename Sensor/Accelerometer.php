<?php

/*
 * The MIT License
 *
 * Copyright 2014 rohandalvi.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * Description of Accelerometer
 *
 * @author rohandalvi
 */
require 'Sensor.php';
class Accerlerometer extends Sensor {
    
    private $x,$y,$z; //x,y,z axis data
    private $g = 9.81;
    //put your code here
	
	public function __construct(){
		$this->x = array(min => -($this->g)*250*0.00001, max => $this->g*250*0.0001);
		
		$this->y = array(min => -($this->g)*250*0.0001, max=> $this->g*250*0.0001);
		
		$this->z = array(min => 9.5, max => 9.9);
	}
	
	function __destruct(){
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
