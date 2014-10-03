<?php

/*
 * 
 * @Author: Rohan Dalvi (rsd3565@rit.edu)
 * @version: 1.0
 * @date: 10/3/14.
 */
require_once 'parsecsv-for-php/parsecsv.lib.php';
class csvImport {

    //Class to import csv files containing sensor data into 
    private $nameFile;
    private $dataArray=[];
    private $fileObject;
    private $csv=null;

    function __construct($filename) {
        if (file_exists($filename)) {

            $this->nameFile = $filename;
            $this->fileObject = file($filename);
            $this->csv = new parseCSV($filename);
            $this->csv->delimiter = "\t"; //set tab space as delimiter for csv
//                           
        } else {
            die("File not found, make sure the file is at " . __FILE__);
        }
    }

    public function __destruct() {
        $this->nameFile = null;
        $this->dataArray = [];
        $this->fileObject=null;
        $this->csv=null;
    }

    public function readCSV($filename, $optional_var) {

        if($this->csv!=null){
            $this->dataArray = $this->csv->data;
        }
       
    }

    public function countRecords() {
        return count($this->fileObject);
    }

    //returns field names at the top in an array.
    /*
     * The field names can be accessed as for example, $returnArray[0]...[1]..[2]..etc
     * Obviously, count($returnArray) will provide the number of fields.
     */
    public function getFieldNames() {
       if(count($this->dataArray)==0){
            $this->readCSV($this->nameFile, null);
        }
        $returnArray = array_keys($this->dataArray[0]);
        
        return $returnArray;
        
    }

}
?>
