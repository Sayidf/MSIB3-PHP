<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 5 PHP Sayid Farhan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="bg-secondary vh-100 d-flex justify-content-center align-items-center">
  <div>
    <h3 class="text-center text-light mb-2">Data Bidang Datar</h3><br>
    <table class="table table-dark table-striped w-auto text-center align-middle">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Bidang</th>
          <th>Keterangan</th>
          <th>Luas Bidang</th>
          <th>Keliling Bidang</th>
        </tr>
      </thead>
    <?php
    require_once 'Lingkaran.php';
    require_once 'PersegiPanjang.php';
    require_once 'Segitiga.php';
  
    $l1 = new Lingkaran(10);
    $l2 = new Lingkaran(20);
    $l3 = new Lingkaran(50);
    $p1 = new PersegiPanjang(2, 5);
    $p2 = new PersegiPanjang(5, 10);
    $p3 = new PersegiPanjang(15, 5);
    $s1 = new Segitiga(6, 8);
    $s2 = new Segitiga(3, 4);
    $s3 = new Segitiga(12, 5);
  
    $bidang = [$l1, $l2, $l3, $p1, $p2, $p3, $s1, $s2, $s3];
  
    foreach($bidang as $bdg){ 
      static $no = 1; 
    ?>
      <tbody>
        <td><?= $no++; ?></td>
        <td><?= $bdg->namaBidang(); ?></td>
        <td><?= $bdg->keterangan(); ?></td>
        <td><?= $bdg->luasBidang(); ?></td>
        <td><?= $bdg->kelilingBidang(); ?></td>
      </tbody>
    <?php } ?>
    </table>
  </div>
  </body>
</html>