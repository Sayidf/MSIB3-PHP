<?php
require_once 'Bentuk2D.php';
class PersegiPanjang extends Bentuk2D{
  ///member1 variabel
  public $panjang;
  public $lebar;
  //member constructor
  public function __construct($panjang, $lebar){
    $this->panjang = $panjang;
    $this->lebar = $lebar;
  }
  public function namaBidang(){
    echo 'Persegi Panjang';
  }
  public function keterangan(){
    echo 'P = '.$this->panjang.' cm';
    echo '<br>L = '.$this->lebar.' cm';
  }
  public function luasBidang(){
    echo $this->panjang * $this->lebar.' cm'; 
  }
  public function kelilingBidang(){
    echo 2 * ($this->panjang + $this->lebar).' cm';
  }
}