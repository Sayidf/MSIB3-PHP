<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 4 PHP Sayid Farhan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="bg-dark vh-100 d-flex justify-content-center align-items-center">
    <?php
      $no = 1;
      class Pegawai{
        //member1 variabel
        public $nip, $nama, $jabatan, $agama, $status;
        static $no = 1;
        //member2 konstruktor
        public function __construct($nip, $nama, $jabatan, $agama, $status){
          $this->nip = $nip;
          $this->nama = $nama;
          $this->jabatan = $jabatan;
          $this->agama = $agama;
          $this->status = $status;
        }
        //member3 method2
        public function setGajiPokok(){
          switch ($this->jabatan) {
            case 'Manager': $this->gajiPokok = 15000000; 
            return $this->gajiPokok; 
            break;
            case 'Asisten Manager': $this->gajiPokok = 10000000; 
            return $this->gajiPokok; 
            break;
            case 'Kepala Bagian': $this->gajiPokok = 7000000; 
            return $this->gajiPokok; 
            break;
            case 'Staff': $this->gajiPokok = 4000000; 
            return $this->gajiPokok; 
            break;
            default: $this->gajiPokok = '';
          }
        }
        public function setTunjab(){
          $this->tunjanganJabatan = 0.2 * $this->gajiPokok;
          return $this->tunjanganJabatan;
        }
        public function setTunkel(){
          $this->tunjanganKeluarga = ($this->status == 'Menikah') ? 0.1 * $this->gajiPokok : 0;
          return $this->tunjanganKeluarga;
        }
        public function setZakatProfesi(){
          $this->zakatProfesi = ($this->agama == 'Islam' && ($this->gajiPokok + $this->tunjanganJabatan + $this->tunjanganKeluarga) >= 6000000) ? 0.025 * ($this->gajiPokok + $this->tunjanganJabatan + $this->tunjanganKeluarga) : 0;
          return $this->zakatProfesi;
        }
        public function setGaber(){
          $this->gajiBersih = $this->gajiPokok + $this->tunjanganJabatan + $this->tunjanganKeluarga - $this->zakatProfesi;
          return $this->gajiBersih;
        }
        public function mencetak(){ ?>
          <fieldset class="border border-light p-3 mx-2">
            <h5 class="text-center text-light mb-4">Data Pegawai #<?= self::$no ?></h5>
            <table class="table table-dark table-striped w-auto">
              <tr>
                <th width="180">NIP</th>
                <td style="min-width: 150px"><?= $this->nip;?></td>
              </tr>
              <tr>
                <th>Nama</th>
                <td><?= $this->nama;?></td>
              </tr>
              <tr>
                <th>Jabatan</th>
                <td><?= $this->jabatan;?></td>
              </tr>
              <tr>
                <th>Agama</th>
                <td><?= $this->agama;?></td>
              </tr>
              <tr>
                <th>Status</th>
                <td><?= $this->status;?></td>
              </tr>
              <tr>
                <th>Gaji Pokok</th>
                <td>Rp. <?= number_format($this->setGajiPokok(), 0, ',', '.'); ?></td>
              </tr>
              <tr>
                <th>Tunjangan Jabatan</th>
                <td>Rp. <?= number_format($this->setTunjab(), 0, ',', '.'); ?></td>
              </tr>
              <tr>
                <th>Tunjangan Keluarga</th>
                <td>Rp. <?= number_format($this->setTunkel(), 0, ',', '.'); ?></td>
              </tr>
              <tr>
                <th>Zakat Profesi</th>
                <td>Rp. <?= number_format($this->setZakatProfesi(), 0, ',', '.'); ?></td>
              </tr>
              <tr>
                <th>Gaji Bersih</th>
                <td>Rp. <?= number_format($this->setGaber(), 0, ',', '.'); ?></td>
              </tr>
            </table>
          </fieldset>
        <?php self::$no++; }
      }

      $p1 = new Pegawai('00000001','Sayid','Manager','Islam','Belum Menikah');
      $p2 = new Pegawai('00000002','Farhan','Asisten Manager','Konghucu','Menikah');
      $p3 = new Pegawai('00000003','Nurul','Kepala Bagian','Islam','Menikah');
      $p4 = new Pegawai('00000004','Fikri','Kepala Bagian','Buddha','Belum Menikah');
      $p5 = new Pegawai('00000005','Agung','Staff','Islam','Menikah');

      $p1->mencetak();
      $p2->mencetak();
      $p3->mencetak();
      $p4->mencetak();
      $p5->mencetak();
    ?>
  </body>
</html>