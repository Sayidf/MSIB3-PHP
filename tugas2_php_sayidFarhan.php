<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="bg-dark">
    <form class="card mx-auto w-50 mt-5" method="post">
      <div class="mx-4">
        <h3 class="text-center my-4">Form Data Pegawai</h3>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="nama" placeholder="nama" required>
          <label for="nama">Nama Pegawai</label>
        </div>

        <div class="form-floating mb-3">
          <select class="form-select" aria-label="Default select example" name="agama" required>
            <option value="" disabled selected>-- Pilih Agama --</option>
            <option value="Islam">Islam</option>
            <option value="Protestan">Kristen Protestan</option>
            <option value="Katolik">Kristen Katolik</option>
            <option value="Hindu">Hindu</option>
            <option value="Buddha">Buddha</option>
            <option value="Konghucu">Konghucu</option>
            <option value="Lainnya">Agama Lainnya</option>
          </select>
          <label for="agama">Agama</label>
        </div>

        <fieldset class="border px-2 pb-2 rounded mb-3">
          <legend><span class="fs-6 text-secondary text-black-50 ps-1">Jabatan</span></legend>
          <div class="row ps-1">
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jabatan" id="jabatan1" value="Manager" required>
                <label class="form-check-label" for="jabatan1">Manager</label>
              </div>
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jabatan" id="jabatan2" value="Kepala Bagian" required>
                <label class="form-check-label" for="jabatan2">Kepala Bagian</label>
              </div>
            </div>
          </div>
          <div class="row ps-1">
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jabatan" id="jabatan3" value="Asisten Manager" required>
                <label class="form-check-label" for="jabatan3">Asisten Manager</label>
              </div>
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jabatan" id="jabatan4" value="Staff" required>
                <label class="form-check-label" for="jabatan4">Staff</label>
              </div>
            </div>
          </div>
        </fieldset>

        <fieldset class="border px-2 pb-2 rounded mb-3">
          <legend><span class="fs-6 text-secondary text-black-50 ps-1">Status</span></legend>
          <div class="row ps-1">
            <div class="col">
              <div class="form-check">
                <input class="form-check-input agamaBtn" type="radio" name="status" id="status1" value="Menikah" required>
                <label class="form-check-label" for="status1">Menikah</label>
              </div>
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input agamaBtn" type="radio" name="status" id="status2" value="Belum Menikah" required>
                <label class="form-check-label" for="status2">Belum Menikah</label>
              </div>
            </div>
          </div>
        </fieldset>

        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="jmlAnak" id="jmlAnak" placeholder="jumlahanak" value="">
          <label for="jumlahanak">Jumlah Anak</label>
        </div>

        <!-- Submit button -->
        <button class="btn btn-outline-info my-4 mx-auto" name="simpan" type="submit">Simpan</button>
      </div>
    </form>
    <?php
    error_reporting(0);
    $nama = $_POST['nama'];
    $agama = $_POST['agama'];
    $jabatan = $_POST['jabatan'];
    $status = $_POST['status'];
    $jmlAnak = $_POST['jmlAnak'];
    $tombol = $_POST['simpan'];
    
    //switch gaji pokok
    switch ($jabatan) {
      case 'Manager': $gajiPokok = 20000000; break;
      case 'Asisten Manager': $gajiPokok = 15000000; break;
      case 'Kepala Bagian': $gajiPokok = 10000000; break;
      case 'Staff': $gajiPokok = 4000000; break;
      default: $gajiPokok = '';
    }

    //tentukan tunjangan jabatan
    $tunjanganJabatan = 0.2 * $gajiPokok;

    //tentukan tunjangan keluarga
    if($status == 'Menikah' && $jmlAnak < 2) $tunjanganKeluarga = 0.05 * $gajiPokok;
    else if($status == 'Menikah' && $jmlAnak > 2  && $jmlAnak <= 5) $tunjanganKeluarga = 0.1 * $gajiPokok;
    else if($status == 'Menikah' && $jmlAnak > 5) $tunjanganKeluarga = 0.15 * $gajiPokok;
    else $tunjanganKeluarga = 0;
    
    $gajiKotor = $gajiPokok + $tunjanganJabatan + $tunjanganKeluarga;

    //tentukan penilaian
    $zakatProfesi = ($agama == 'Islam' && $gajiKotor >= 6000000) ? 0.025 * $gajiKotor : 0;

    $takehomePay = $gajiKotor - $zakatProfesi;

    if(isset($tombol)){ ?>
    <div class="w-50 mx-auto mt-5">
      <div class="alert alert-success" role="alert">
        <table class="table table-hover table-striped w-auto mx-auto">
          <tr>
            <td>Nama Pegawai</td>
            <td width="30" class="text-center">:</td>
            <td ><?= $nama; ?></td>
          </tr>
          <tr>
            <td>Agama</td>
            <td class="text-center">:</td>
            <td><?= $agama; ?></td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td class="text-center">:</td>
            <td><?= $jabatan; ?></td>
          </tr>
          <tr>
            <td>Status</td>
            <td class="text-center">:</td>
            <td><?= $status; ?></td>
          </tr>
          <tr>
            <td>Jumlah Anak</td>
            <td class="text-center">:</td>
            <td><?= $jmlAnak; ?></td>
          </tr>
          <tr>
            <td>Gaji Pokok</td>
            <td class="text-center">:</td>
            <td><?= number_format($gajiPokok, 2, ',', '.'); ?></td>
          </tr>
          <tr>
            <td>Tunjangan Jabatan</td>
            <td class="text-center">:</td>
            <td><?= number_format($tunjanganJabatan, 2, ',', '.'); ?></td>
          </tr>
          <tr>
            <td>Tunjangan Keluarga</td>
            <td class="text-center">:</td>
            <td><?= number_format($tunjanganKeluarga, 2, ',', '.'); ?></td>
          </tr>
          <tr>
            <td>Gaji Kotor</td>
            <td class="text-center">:</td>
            <td><?= number_format($gajiKotor, 2, ',', '.'); ?></td>
          </tr>
          <tr>
            <td>Zakat Profesi</td>
            <td class="text-center">:</td>
            <td><?= number_format($zakatProfesi, 2, ',', '.'); ?></td>
          </tr>
          <tr>
            <td>Take Home Pay</td>
            <td class="text-center">:</td>
            <td><?= number_format($takehomePay, 2, ',', '.'); ?></td>
          </tr>
        </table>
      </div>
    </div>
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
      $(".agamaBtn").click(function() {
        $("#jmlAnak").attr("disabled", true);
        if ($("input[name=status]:checked").val() == "Menikah") {
          $("#jmlAnak").attr("disabled", false).val('');
        }
        else $("#jmlAnak").val('-');
      });
    </script>
  </body>
</html>