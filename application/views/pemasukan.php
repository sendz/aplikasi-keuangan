<div class="row">
  <div class="col s6">
    <div class="input-field col s5">
      <select class="" name="pemasukan-pilih-kelas" id="pemasukan-pilih-kelas">
        <option value="option" disabled selected>Pilih Kelas</option>
        <option value="all">Semua Kelas</option>
        <?php
        foreach ($kelas as $kelas) :
          echo "<option value='".$kelas->id."'>".$kelas->tingkat." ".$kelas->nama."</option>";
        endforeach;
        ?>
      </select>
    </div>
    <!--
    <div class="input-field col s5">
      <input type="text" name="pemasukan-nama-siswa" id="pemasukan-nama-siswa">
      <label for="pemasukan-nama-siswa">Nama Siswa</label>
    </div>
    <div class="input-field col s2">
      <button type="button" name="pemasukan-cari" id="pemasukan-cari" class="btn waves-effect waves-light">Cari</button>
    </div>
    -->
  </div>

  <div class="col s12">
    <table class="stripped highlight">
      <thead>
        <tr>
          <th rowspan="2">
            No.
          </th>
          <th rowspan="2">
            Nama
          </th>
          <th rowspan="2">
            Kelas
          </th>
          <th>
            Biaya Pendidikan
          </th>
          <th colspan="10">
            Angsuran
          </th>
          <th rowspan="2">
            Status
          </th>
        </tr>
        <tr>
          <th>
            (Akumulasi)
          </th>
          <th>
            1
          </th>
          <th>
            2
          </th>
          <th>
            3
          </th>
          <th>
            4
          </th>
          <th>
            5
          </th>
          <th>
            6
          </th>
          <th>
            7
          </th>
          <th>
            8
          </th>
          <th>
            9
          </th>
          <th>
            10
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
          $index = 1;
          foreach ($pembayaran as $pemasukan) :
            $arrBiaya = array() ;
            foreach ($biayapendidikan as $biaya) {
              array_push($arrBiaya,$biaya->jumlah);
            }
            if ($pemasukan->tingkat == 10) {
              $totalBiayaPendidikan = $arrBiaya[0];
            } elseif ($pemasukan->tingkat == 11) {
              $totalBiayaPendidikan = $arrBiaya[0] + $arrBiaya[1];
            } else {
              $totalBiayaPendidikan = $arrBiaya[0] + $arrBiaya[1] + $arrBiaya[2];
            }


            # code...
            $row  = "<tr>";
            $row  .= "<td>";
            $row  .= $index;
            $row  .= "</td>";
            $row  .= "<td>";
            $row  .= $pemasukan->namasiswa;
            $row  .= "</td>";
            $row  .= "<td>";
            $row  .= $pemasukan->tingkat;
              $row  .= " ";
              $row  .= $pemasukan->namakelas;
            $row  .= "</td>";
            $row  .= "<td>";
            $row  .= "<span class='currency'>";
            $row  .= $totalBiayaPendidikan;
            $row  .= "</span>";
            $row  .= "</td>";
            $jumlah = preg_split("/,/", $pemasukan->jumlah);
              $total = '';
            for ($i = 0; $i < count($jumlah); $i++) {
              $total = $total + $jumlah[$i];
              $row .= "<td>";
              $row .= "<i class='tooltipped material-icons' data-position='bottom' data-tooltip='".$jumlah[$i]."'><img src='" . base_url() . "public/img/ic_done_black_36px.svg' alt='menu' /></i>";
              $row .= "</td>";
            }
            for ($i = 0; $i < (10 - count($jumlah)); $i++) {
              $row .= "<td>";
              $row .= "&nbsp;";
              $row .= "</td>";
            }
            $row .= "<td>";
            if ($totalBiayaPendidikan - $total == 0) {
              $keterangan = "<a href='" . base_url() . index_page() . "/pemasukan/siswa/nis/".$pemasukan->nis."' class='btn'>Lunas</span>";
            } else {
              $keterangan = "<a href='" . base_url() . index_page() . "/pemasukan/siswa/nis/".$pemasukan->nis."' class='btn red'>-";
              $keterangan .= "<span class='currency'>";
              $keterangan .= $totalBiayaPendidikan - $total;
              $keterangan .= "</span>";
              $keterangan .= "</a>";
            }
            $row .= $keterangan;
            $row .= "</td>";
            $row .= "</tr>";
            echo $row;
            $index++;
          endforeach;
        ?>
      </tbody>
    </table>
  </div>
  <?php if ($_SESSION['role'] == 1) : ?>
  <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red modal-trigger" href="#pemasukan-tambah">
      <i class="large material-icons"><img style="margin:4px;" src="<?php echo base_url(); ?>public/img/ic_add_white_48px.svg" alt="menu" /></i>
    </a>
  </div>
<?php endif; ?>
  <div id="pemasukan-tambah" class="modal">
    <form class="" action="<?php echo base_url() . index_page(); ?>/pemasukan/tambah" method="post">
      <div class="modal-content">
        <h4>Tambah Pemasukan</h4>
        <div class="input-field col s12">
          <select class="" name="pemasukan-tambah-kelas" id="pemasukan-tambah-kelas">
            <option value="option" disabled selected>Kelas</option>
            <?php
            foreach ($kelas as $kelas) :
              echo "<option value='".$kelas->id."'>".$kelas->tingkat." ".$kelas->nama."</option>";
            endforeach;
            ?>
          </select>
          <label for="pemasukan-tambah-kelas">Kelas</label>
        </div>
        <div class="col s12">
        <label for="pemasukan-tambah-nama">Nama</label>
          <select class="browser-default" name="pemasukan-tambah-nama" id="pemasukan-tambah-nama">
            <option value="option" disabled selected>Pilih Kelas</option>
          </select>
        </div>
        <div class="col s12">
          <label for="pemasukan-tambah-tanggal">Tanggal</label>
          <input type="date" name="pemasukan-tambah-tanggal" id="pemasukan-tambah-tanggal" placeholder="tanggal">
        </div>
        <div class="input-field col s12">
          <input type="number" name="pemasukan-tambah-dana" id="pemasukan-tambah-dana">
          <label for="pemasukan-tambah-dana">Jumlah Pembayaran</label>
        </div>
        <div class="class col s12">
          <?php foreach ($pengaturan as $pengaturan) : ?>
          <input type="hidden" name="pemasukan-tambah-bendahara" value="<?php echo $pengaturan->namabendahara; ?>">
          <?php endforeach; ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">Simpan</button>
      </div>
    </form>
  </div>
</div>
<script>
document.getElementById('pemasukan-pilih-kelas').onchange = function() {
  var id = this.value;
  window.location.href = '<?php echo base_url() . index_page(); ?>' + '/pemasukan/kelas/id/' + id;
}
</script>
