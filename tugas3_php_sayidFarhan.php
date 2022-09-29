<?php
//array scalar mahasiswa
$m1 = ['nim' => '191402001', 'nama' => 'Ali', 'nilai' => 80,];
$m2 = ['nim' => '191402002', 'nama' => 'Ryan', 'nilai' => 65];
$m3 = ['nim' => '191402003', 'nama' => 'Bambang', 'nilai' => 77];
$m4 = ['nim' => '191402004', 'nama' => 'Rafli', 'nilai' => 55];
$m5 = ['nim' => '191402005', 'nama' => 'Nurul', 'nilai' => 91];
$m6 = ['nim' => '191402006', 'nama' => 'Fikri', 'nilai' => 73];
$m7 = ['nim' => '191402007', 'nama' => 'Burhan', 'nilai' => 27];
$m8 = ['nim' => '191402008', 'nama' => 'Sayid', 'nilai' => 98];
$m9 = ['nim' => '191402009', 'nama' => 'Fulan', 'nilai' => 58];
$m10 = ['nim' => '191402010', 'nama' => 'Fahrul', 'nilai' => 78];

//array assosiative mahasiswa
$mahasiswa = [$m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10];

//array judul tabel
$ar_judul = ['No', 'NIM', 'Nama', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

//daftar aggregate function tfoot
$jumlah_siswa = count($mahasiswa);
$jml_nilai = array_column($mahasiswa, 'nilai');
$total_nilai = array_sum($jml_nilai);
$max_nilai = max($jml_nilai);
$min_nilai = min($jml_nilai);
$rata2 = $total_nilai / $jumlah_siswa;

//keterangan
$keterangan_nilai = [
  'Nilai Tertinggi' => $max_nilai, 
  'Nilai Terendah' => $min_nilai, 
  'Nilai Rata2' => $rata2,
  'Jumlah Mahasiswa' => $jumlah_siswa
];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 3 PHP Sayid Farhan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-secondary">
    <h3 class="text-center mt-5 text-white">Daftar Mahasiswa</h3>
    <table class="table table-striped mx-auto w-auto text-center mt-4">
      <thead class="table-dark">
        <tr>
          <?php foreach($ar_judul as $jdl){ ?>
            <th class="scope"><?= $jdl ?></th>
          <?php } ?>
        </tr>
      </thead>
      <tbody class="table-light">
        <?php 
          $no = 1;
          foreach($mahasiswa as $mhs){
          //rumus2
          $keterangan = ($mhs['nilai'] >= 60) ? "Lulus" : "Gagal";
          
          if ($mhs['nilai'] >= 85 && $mhs['nilai'] <= 100) $grade = 'A';
          else if ($mhs['nilai'] >= 75 && $mhs['nilai'] <= 84) $grade = 'B';
          else if ($mhs['nilai'] >= 65 && $mhs['nilai'] <= 74) $grade = 'C';
          else if ($mhs['nilai'] >= 55 && $mhs['nilai'] <= 64) $grade = 'D';
          else $grade = 'E';

          switch($grade){
            case 'A': $predikat = 'Memuaskan' ; break;
            case 'B': $predikat = 'Bagus'; break;
            case 'C': $predikat = 'Cukup'; break;
            case 'D': $predikat = 'Kurang'; break;
            case 'E': $predikat = 'Buruk'; break;
            default: $predikat = '';
          }

        ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $mhs['nim'] ?></td>
          <td><?= $mhs['nama'] ?></td>
          <td><?= $mhs['nilai'] ?></td>
          <td><?= $keterangan ?></td>
          <td><?= $grade ?></td>
          <td><?= $predikat ?></td>
        </tr>
        <?php $no++; } ?>
      </tbody>
      <tfoot>
        <?php
        foreach($keterangan_nilai as $ket => $tampil){ ?>
          <tr class="table-dark">
            <th colspan="6" class="scope text-start"><?= $ket ?></th>
            <th class="text-end"><?= $tampil ?></th>
          </tr>
        <?php } ?>
      </tfoot>
    </table>
  </body>
</html>
