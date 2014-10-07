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
    //put your code here
    
    function __construct($data) {
        parent::__construct($data);
    }
    
    function __destruct() {
        parent::__destruct();
    }
    
    /*
     * Return percentage of missing values
     */
    public function getMissingValues() {
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
    
}
