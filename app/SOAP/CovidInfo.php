<?php

namespace App\SOAP;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CovidInfo
 *
 * @author thoma
 */
class CovidInfo {
    //put your code here
    /*
     * @var integer
     */
    protected $n;
            
    /*
     * @param integer
     */
    public function __construct($n) {
        $this->n = $n;
    }
    
    /*
     * @return integer
     */
    public function getN(){
        return $this->n;
    }
}
