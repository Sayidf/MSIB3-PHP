<?php
require_once 'Bentuk2D.php';
class Lingkaran extends Bentuk2D{
  ///member1 variabel
  public $jari;
  //member constructor
  public function __construct($jari){
    $this->jari = $jari;
  }
  public function namaBidang(){
    echo 'Lingkaran';
  }
  public function keterangan(){
    echo 'r = '.$this->jari.' cm';
  }
  public function luasBidang(){
    echo 3.14 * (pow($this->jari, 2)).' cm';
  }
  public function kelilingBidang(){
    echo 2 * 3.14 * $this->jari.' cm';
  }
}