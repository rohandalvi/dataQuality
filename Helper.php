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
 * Description of newPHPClass
 *
 * @author rohandalvi
 */
class Helper {
    //put your code here
    
    public function __construct() {
        
    }
    
    public function testUniqueness($string1, $string2){
        $s1 = strtolower($string1);
        $s2 = strtolower($string2);
        
        $lcs = $this->LCS_Length($s1, $s2);
        
        $ms = (strlen($s1) + strlen($s2)) / 2; 
        return (($lcs*100)/$ms); 
        //return levenshtein($string1, $string2);
        
    }
    
    private function LCS_Length($s1, $s2) 
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
    
    
    
}


