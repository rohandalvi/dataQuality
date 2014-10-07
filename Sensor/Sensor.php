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
    
    
    protected $data;
    function __construct($data) {
        
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
    public function getCompleteness(){
        
    }
    
    
    //put your code here
}
