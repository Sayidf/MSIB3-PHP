<?php
require_once 'Bentuk2D.php';
class Segitiga extends Bentuk2D{
  ///member1 variabel
  public $alas;
  public $tinggi;
  //member constructor
  public function __construct($alas, $tinggi){
    $this->alas = $alas;
    $this->tinggi = $tinggi;
  }
  public function namaBidang(){
    echo 'Segitiga';
  }
  public function keterangan(){
    echo 'A = '.$this->alas.' cm';
    echo '<br>T = '.$this->tinggi.' cm';
    echo '<br>c = '.(sqrt(pow($this->alas, 2)+ pow($this->tinggi, 2))).' cm';
  }
  public function luasBidang(){
    echo 1/2 * $this->alas * $this->tinggi.' cm';
  }
  public function kelilingBidang(){
    echo $this->alas + $this->tinggi + (sqrt(pow($this->alas, 2)+ pow($this->tinggi, 2))).' cm';
  }
}