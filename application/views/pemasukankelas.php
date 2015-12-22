<div class="row">
  <div class="col s6 noprint">
    <div class="input-field col s5">
      <select class="" name="pemasukan-pilih-kelas" id="pemasukan-pilih-kelas">
        <option value="option" disabled selected>Pilih Kelas</option>
        <option value="all">Semua Kelas</option>
        <?php
          foreach ($kelas as $kelas) {
            echo "<option value='".$kelas->id."'>".$kelas->tingkat." ".$kelas->nama."</option>";
          }
        ?>
      </select>
    </div>
  </div>
</div>
<div class="row">
  <div class="col s12">
    <?php
    if (count($pembayaran) > 1) {
      echo "<h3 class='center'>Semua Kelas</h3>";
    } else {
      foreach ($pembayaran as $data) {
        echo "<h3 class='center'>Kelas " . $data->tingkat . " " . $data->namakelas . "</h3>";
      }
    }
    ?>
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
          <th colspan="10" class="center">
            Angsuran
          </th>
          <th rowspan="2">
            <span class='right'>Jumlah</span>
          </th>
        </tr>
        <tr>
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
          $totalKelas = '';
          foreach ($pembayaran as $pemasukan) :
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
            $jumlah = preg_split("/,/", $pemasukan->jumlah);
              $total = '';
            for ($i = 0; $i < count($jumlah); $i++) {
              $total = $total + $jumlah[$i];
              $row .= "<td>";
              $row .= "<i class='tooltipped material-icons' data-position='bottom' data-tooltip='".$jumlah[$i]."'>done</i>";
              $row .= "</td>";
            }
            for ($i = 0; $i < (10 - count($jumlah)); $i++) {
              $row .= "<td>";
              $row .= "&nbsp;";
              $row .= "</td>";
            }
            $row .= "<td>";
            $row .= "<span class='right currency'>";
            $row .= $total;
            $row .= "</span>";
            $row .= "</td>";
            $row .= "</tr>";
            echo $row;
            $index++;
            $totalKelas = $totalKelas + $total;
          endforeach;
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="10">
            <span class="right">Total</span>
          </th>
          <td colspan="4">
            <span class='right currency'><?php echo $totalKelas; ?></span>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>

<script>
document.getElementById('pemasukan-pilih-kelas').onchange = function() {
  var id = this.value;
  window.location.href = '<?php echo base_url() . index_page(); ?>' + '/pemasukan/kelas/id/' + id;
}
</script>
