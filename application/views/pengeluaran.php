<div class="row">
  <div class="col s12">
    <table class="stripped highlight print">
      <thead>
        <tr>
          <th>
            Tanggal
          </th>
          <th>
            Jumlah
          </th>
          <th>
            Nama Kegiatan
          </th>
          <th>
            Tujuan
          </th>
          <th>
            Penanggungjawab
          </th>
          <th>
            Bendahara
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach($pengeluaran as $pengeluaran) {
            $row = '';
            $row .= '<tr>';
            $row .= '<td>';
            $row .= $pengeluaran->tanggal;
            $row .= '</td>';
            $row .= '<td>';
            $row .= $pengeluaran->jumlah;
            $row .= '</td>';
            $row .= '<td>';
            $row .= $pengeluaran->namakegiatan;
            $row .= '</td>';
            $row .= '<td>';
            $row .= $pengeluaran->tujuan;
            $row .= '</td>';
            $row .= '<td>';
            $row .= $pengeluaran->penanggungjawab;
            $row .= '</td>';
            $row .= '<td>';
            $row .= $pengeluaran->bendahara;
            $row .= '</td>';
            $row .= '</tr>';
            echo $row;
          }
        ?>
      </tbody>
    </table>
  </div>

  <div class="modal noprint" id="modal-tambah">
    <form class="" action="<?php echo base_url() . index_page(); ?>/pengeluaran/tambah" method="post">
      <div class="modal-content">
        <h4>Tambah Pengeluaran</h4>
        <div class="col s12">
        <label for="pengeluaran-tambah-tanggal">Tanggal</label>
          <input type="date" name="pengeluaran-tambah-tanggal" id="pengeluaran-tambah-tanggal" value="">
        </div>
        <div class="input-field col s12">
          <input type="number" name="pengeluaran-tambah-jumlah" id="pengeluaran-tambah-jumlah" value="">
          <label for="pengeluaran-tambah-jumlah">Jumlah</label>
        </div>
        <div class="input-field col s12">
          <textarea name="pengeluaran-tambah-kegiatan" id="pengeluaran-tambah-kegiatan" class="materialize-textarea"></textarea>
          <label for="pengeluaran-tambah-kegiatan">Nama Kegiatan</label>
        </div>
        <div class="input-field col s12">
          <textarea name="pengeluaran-tambah-tujuan" id="pengeluaran-tambah-tujuan" class="materialize-textarea"></textarea>
          <label for="pengeluaran-tambah-tujuan">Tujuan</label>
        </div>
        <div class="input-field col s12">
          <input type="text" name="pengeluaran-tambah-penanggungjawab" id="pengeluaran-tambah-penanggungjawab" value="">
          <label for="pengeluaran-tambah-penanggungjawab">Penanggungjawab</label>
        </div>
        <div class="input-field col s12">
          <?php foreach ($pengaturan as $datapengaturan) : ?>
            <input type="text" name="pengeluaran-tambah-bendahara" id="pengeluaran-tambah-bendahara" value="<?php echo $datapengaturan->namabendahara; ?>" readonly="true">
            <label for="pengeluaran-tambah-bendahara">Bendahara</label>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="simpan" class="modal-action modal-close waves-effect waves-green btn-flat">Simpan</button>
      </div>
    </form>
  </div>
</div>
