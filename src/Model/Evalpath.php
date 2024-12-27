<?php
namespace P2u2\Model;

use P2u2\Model\Newmethod as Newmethod;
use P2u2\Model\P2u2 as P2;

class Evalpath {

    public $Eval_pathOps;
    public $locationOps;
    public $Eval_part_one;
    public $Eval_part_two;
    public $Eval_part_three;
    public $Eval_object_one;
    public $Eval_object_two;
    public $path_builder;
    
    public function __construct($pathOps = null)
    {
        if(!isset($this->Eval_pathOps)) {
            $this->Eval_pathOps = $pathOps;
        }
        //$this->test_location($this->Eval_pathOps);
    }

    public function test_location($locationOps) {
        $Newmethod = new Newmethod($locationOps);
        $nm = $Newmethod->buildUrl($locationOps);
        $_dynamichost = $nm['_dynamichost'];
        
        if(!isset($this->locationOps)) {
            $this->locationOps = $locationOps;
        }
        $this->path_builder = [];
        $P2 = new P2($locationOps);
        $matches = $P2->path_comps;
        
        foreach($matches as $matchKey => $matchVal){
            $pb[$matchKey] = $matchVal;
            switch ($matchKey) {
                case 'var':
                    # code...
                    break;
                case 'www':
                        # code...
                        break;
                case $_dynamichost:
                    $this->path_builder[] = $matchVal;
                            break;
                                            
                default:
                $this->path_builder[] = $matchVal;
                    break;
            } 
            
        }
        $this->path_builder['pb'] = $pb;
        return $this->path_builder;
    }
}