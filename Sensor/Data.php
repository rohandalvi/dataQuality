<?php
include_once 'Accelerometer.php';
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
 * Description of Data
 *
 * @author rohandalvi
 */
class Data extends  Sensor {
    //put your code here
    
    private $percentUnique;
    private $percentComplete;
    private $percentTimeliness;
    private $percentValid;
    private $percentAccuracy;
    private $percentConsistency;
    private $data= array();
    
    function __construct($data){
        $this->data = $data;
    }
    
    function __destruct(){
        
    }
    
    public function getData(){
        return $this->data;
    }
    
    public function calculateUniqueness(){
        parent::getUniqueness();
        //echo "ORIGINAL ".count($this->data);
        
        $lines = array();
        for($i=0;$i<count($this->data);$i++){
            $line1 = join(",", $this->data[$i]);
            for($j=0;$j<count($this->data);$j++){
                if($i!=$j){
                    $line2 = join(",", $this->data[$j]);
                    //echo "Uniqueness measure ".$this->testUniqueness($line1, $line2)."\n";
                    if($this->testUniqueness($line1, $line2)<95){
                       // echo "Distinct ".$line1."\n";
                       $lines[$line1] = true; 
                    }
                }
            }
        }
        
        //echo "MODIFIED ".count($lines);
        $count = array_count_values($this->data[0]);
        
        return ($count/count($this->data[0]))*100;
        
        
    }
    
    public function calculateCompleteness(){
        parent::getMissingValues();
        $percentMissing=0;
        if(count($this->data)==0) return 0;
        else{
            $countMissing = 0;
            for($i=0;$i<count($this->data);$i++){
                if(isMissing($this->data[$i]["x"]) || isMissing($this->data[$i]["y"]) || isMissing($this->data[$i]["z"])){
                    $countMissing++;
                }
            }
            $percentMissing = ($countMissing/(count($this->data)*3))*100;
            return $percentMissing;
        }
    }
    
    public function calculateTimeliness(){
        
    }
    
    public function calculateValidity(){
        $sensorType = $this->getSensorType();
		
		switch($sensorType){
			case 'ACCELEROMETER': /*
			 * create new accelerometer object 
			 */
			$count = 0; 
			$accelerometer = new Accelerometer();
			for($i=0;$i<count($this->data);$i++){
				$xValue = $this->data[$i]["x"];
				$yValue = $this->data[$i]["y"];
				$zValue = $this->data[$i]["z"];
				
				if($xValue<$accelerometer->getXMin() && $xValue>getXMax()){$count++;}
				if($yValue<$accelerometer->getYMin() && $yValue>getYMax()){$count++;}
				if($zValue<$accelerometer->getZMin() && $zValue>getZMax()){$count++;}
			}
				break;
				
				
			case 'GRAVITY':
				
				break;
		}
    }
    
    public function calculateAccuracy(){
        //get sensor accuracy from metadata
    }
    
    public function calculateConsistency(){
        
    }
}
