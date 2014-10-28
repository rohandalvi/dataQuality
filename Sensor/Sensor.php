<?php
include_once '../importData/csvImport.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Sensor
 *
 * @author rohandalvi
 */
class Sensor {
    
    
    protected $fileName;
    function __construct($file) {
        $this->fileName = $file;
    }
    
    function __destruct() {
        
    }
    
    
    public static $sensorType = array(
        
        "accelerometer" => "1",
        "gyroscope" => "2",
        "gravity" => "3",
        "pressure" => "4",
        "temperature" => "5"
    );
	
	public function getSensorType(){
		$csv = new csvImport($this->fileName);
		return $csv->getSensorType();
	}
    
	public function getPhoneType(){
		$csv = new csvImport($this->fileName);
		return $csv->getPhoneType();
	}
	
    /*
     * This function gives accuracy of data supplied.
     * 
     * Note that variable '$data' is of type array containing csv informaation
     */
    
    public function getAccuracy(){
        
    }
    
    /*
     * Returns the percentage missing values .
     */
    
    
    public function getMissingValues(){
        
    }
    /*
     * Returns the percentage of completeness of given data
     */
    
    
    public function getUniqueness(){
        
    }
    /*
     * Function to test uniqueness of two strings.
     * The measureUniqueness() returns a measure of uniqueness between two strings
     * This measure is then returned as percentage by this function.
     */
    public function testUniqueness($string1, $string2){
        $s1 = strtolower($string1);
        $s2 = strtolower($string2);
        
        $lcs = $this->measureUniqueness($s1, $s2);
        
        $ms = (strlen($s1) + strlen($s2)) / 2; 
        return (($lcs*100)/$ms); 
        
        
    }
    /*
     * Algorithm to return measure of uniqueness between two strings
     * 
     */
     private function measureUniqueness($s1, $s2) 
    { 
      $m = strlen($s1); 
      $n = strlen($s2); 

      //this table will be used to compute the LCS-Length, only 128 chars per string are considered 
      $LCS_Length_Table = array(array(128),array(128)); 


      //reset the 2 cols in the table 
      for($i=1; $i < $m; $i++) $LCS_Length_Table[$i][0]=0; 
      for($j=0; $j < $n; $j++) $LCS_Length_Table[0][$j]=0; 

      for ($i=1; $i <= $m; $i++) { 
        for ($j=1; $j <= $n; $j++) { 
          if ($s1[$i-1]==$s2[$j-1]) 
            $LCS_Length_Table[$i][$j] = $LCS_Length_Table[$i-1][$j-1] + 1; 
          else if ($LCS_Length_Table[$i-1][$j] >= $LCS_Length_Table[$i][$j-1]) 
            $LCS_Length_Table[$i][$j] = $LCS_Length_Table[$i-1][$j]; 
          else 
            $LCS_Length_Table[$i][$j] = $LCS_Length_Table[$i][$j-1]; 
        } 
      } 
      return $LCS_Length_Table[$m][$n]; 
    } 
    
    //put your code here
}
