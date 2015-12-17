<div class="row">
  <div class="col s12">
    <?php foreach ($pembayaran as $data) : ?>
    <table>
      <?php
        $arrBiaya = array() ;
        foreach ($biayapendidikan as $biaya) {
          array_push($arrBiaya,$biaya->jumlah);
        }
        if ($data->tingkat == 10) {
          $totalBiayaPendidikan = $arrBiaya[0];
        } elseif ($data->tingkat == 11) {
          $totalBiayaPendidikan = $arrBiaya[0] + $arrBiaya[1];
        } else {
          $totalBiayaPendidikan = $arrBiaya[0] + $arrBiaya[1] + $arrBiaya[2];
        }

        $jumlah = preg_split("/,/", $data->jumlah);
        $tanggal = preg_split("/,/", $data->tanggal);
      ?>
      <tr>
        <th style="width: 30%;">
          Nama Siswa
        </th>
        <td>
          <?php echo $data->namasiswa; ?>
        </td>
      </tr>
      <tr>
        <th>
          NIS
        </th>
        <td>
          <?php echo $data->nis; ?>
        </td>
      </tr>
      <tr>
        <th>
          Kelas
        </th>
        <td>
          <?php echo $data->tingkat . " " . $data->namakelas; ?>
        </td>
      </tr>
      <tr>
        <th>
          Biaya Pendidikan (Akumulasi)
        </th>
        <td>
          <?php echo "<span class='currency'>" . $totalBiayaPendidikan . "</span>"; ?>
        </td>
      </tr>
    </table>
    <table>
      <thead>
        <tr>
          <th colspan="10" class="center">
            Rincian Pembayaran
          </th>
        </tr>
        <tr>
          <?php for($i = 1; $i <= 10; $i++) {
            echo "<th style='width: 10%;'><span class='right'>".$i."</span></th>";
          } ?>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
          $total = '';
          for($i = 0; $i < count($jumlah); $i++) {
            $total = $total + $jumlah[$i];
            echo "<td>";
            echo "<span class='right'>" . $tanggal[$i] . "</span></br>";
            echo "<span class='right currency'>" . $jumlah[$i] . "</span>";
            echo "</td>";
          }
          for ($i = 0; $i < (10 - count($jumlah)); $i++) {
            echo "<td>&nbsp;</td>";
          }
          ?>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="7">
            <span class="right">Total</span>
          </th>
          <td colspan="3">
            <span class="right currency"><?php echo $total; ?></span>
          </td>
        </tr>
        <tr>
          <th colspan="7">
            <span class="right">Sisa Tunggakan</span>
          </th>
          <td colspan="3">
            <span class="right currency"><?php echo $totalBiayaPendidikan - $total; ?></span>
          </td>
        </tr>
      </tfoot>
    </table>
    <?php endforeach; ?>
  </div>
</div>
