<?php
	class csvImport{
		//Class to import csv files containing sensor data into 
		private $nameFile;
		private $dataArray;
		private $fileObject;
		function __construct($filename){
			
			$this->nameFile = $filename;
		}
		
		function __destruct(){
			
		}
		
		public function readCSV($filename,$optional_var){
			
			if($this->fileObject = fopen($filename, "r") !== FALSE){
				while(($data == fgetcsv($handle,1000,",")) !== FALSE)
					array_push($this->dataArray,$data);
			}
			
		}
		
		public function countRecords(){
			return count($this->fileObject);
		}
		
		//returns field names at the top in an array.
		public function getFieldNames(){
			return $this->dataArray[0];
		}
			
		
	}

?>
