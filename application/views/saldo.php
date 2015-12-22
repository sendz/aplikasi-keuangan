<div class="row">
  <div class="col s12 noprint">
    <h5>Filter per tanggal</h5>
    <form class="form" action="<?php echo base_url() . index_page(); ?>/kas/saldo" method="post">
      <div class="col s3">
      <label for="kas-tanggal-mulai">Dari tanggal:</label>
        <input type="date" name="kas-tanggal-mulai" value="">
      </div>
      <div class="col s3">
      <label for="kas-tanggal-hingga">Hingga tanggal:</label>
        <input type="date" name="kas-tanggal-hingga" value="">
      </div>
      <div class="input-field col s1">
        <button type="submit" class="btn" name="kas-filter">Filter</button>
      </div>
    </form>
  </div>
  <div class="col s12">
    <table>
      <thead>
        <tr>
          <th>
            No.
          </th>
          <th>
            Keterangan
          </th>
          <th>
            Tujuan
          </th>
          <th>
            Penanggung jawab
          </th>
          <th>
            Tanggal
          </th>
          <th>
            <span class='right'>Kas Masuk</span>
          </th>
          <th>
            <span class='right'>Kas Keluar</span>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
        $index = 1;
        $totalKasMasuk = 0;
        $totalKasKeluar = 0;
        foreach ($transaksi as $data) {
          if ($data->keterangan == 'pemasukan') {
            $keterangan = ucfirst($data->keterangan) . " " . $data->namasiswa . " Kelas " . $data->tingkat . $data->namakelas;
            $kasMasuk = $data->jumlah;
            $kasKeluar = '-';
          } else {
            $keterangan = ucfirst($data->keterangan) . " " . $data->kegiatan;
            $kasMasuk = '-';
            $kasKeluar = $data->jumlah;
          }
          $row = "<tr>";
          $row .= "<td>";
          $row .= $index;
          $row .= "</td>";
          $row .= "<td>";
          $row .= $keterangan;
          $row .= "</td>";
          $row .= "<td>";
          $row .= $data->tujuan;
          $row .= "</td>";
          $row .= "<td>";
          $row .= $data->penanggungjawab;
          $row .= "</td>";
          $row .= "<td>";
          $row .= $data->tanggal;
          $row .= "</td>";
          $row .= "<td><span class='right currency'>";
          $row .= $kasMasuk;
          $row .= "</span></td>";
          $row .= "<td><span class='right currency'>";
          $row .= $kasKeluar;
          $row .= "</span></td>";
          $row .= "</tr>";
          echo $row;
          $index++;
          $totalKasMasuk = $totalKasMasuk + $kasMasuk;
          $totalKasKeluar = $totalKasKeluar + $kasKeluar;
        }
        ?>
      </tbody>
      <tfoot>
        <?php
          echo "<tr><th colspan='4'></th><th><span class='left'>Total</span></th><th><span class='right currency'>" . $totalKasMasuk . "</span></th><th><span class='right currency'>" . $totalKasKeluar . "</span></th></tr>";
          echo "<tr><th colspan='4'></th><th><span class='left'>Kas</span></th><th colspan='2' class='center'><span class='right currency'>" . ($totalKasMasuk - $totalKasKeluar) . "</span></th></tr>";
        ?>
      </tfoot>
    </table>
  </div>
</div>
