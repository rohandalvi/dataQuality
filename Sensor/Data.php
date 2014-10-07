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
 * Description of Data
 *
 * @author rohandalvi
 */
class Data {
    //put your code here
    
    private $percentUnique;
    private $percentComplete;
    private $percentTimeliness;
    private $percentValid;
    private $percentAccuracy;
    private $percentConsistency;
    private $data=[];
    
    function __construct($data){
        $this->data = $data;
    }
    
    function __destruct(){
        
    }
    
    public function getData(){
        return $this->data;
    }
    
    public function calculateUniqueness(){
        echo $data;
        
    }
    
    public function calculateCompleteness(){
        
    }
    
    public function calculateTimeliness(){
        
    }
    
    public function calculateValidity(){
        
    }
    
    public function calculateAccuracy(){
        
    }
    
    public function calculateConsistency(){
        
    }
}
