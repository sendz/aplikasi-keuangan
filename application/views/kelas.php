<div class="row">
  <div class="col s12">
    <table class="stripped highlight responsive-table">
      <thead>
        <tr>
          <th>
            ID
          </th>
          <th>
            Kelas
          </th>
          <th>
            Jumlah Siswa
          </th>
          <?php if ($_SESSION['role'] == 1) : ?>
          <th style="width:150px;">
            Aksi
          </th>
          <?php endif;?>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($list as $data) {
            # code...
            echo "<tr>";
            echo "<td>";
            echo $data->id;
            echo "</td><td>";
            echo $data->tingkat;
            echo " ";
            echo $data->nama;
            echo "</td><td>";
            echo $data->jumlah_siswa;
            echo "</td>";

            if ($_SESSION['role'] == 1) :
            echo "<td>";
            echo "<a class='btn waves-effect waves-light' onClick='modalEditKelas(".$data->id.",\"".$data->tingkat." ".$data->nama."\")'>Edit</a>";
            echo "</td>";
            endif;
            echo "</tr>";
          }
         ?>
      </tbody>
    </table>
  </div>
  <?php if ($_SESSION['role'] == 1) : ?>
  <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red modal-trigger" href="#siswa-tambah-kelas">
      <i class="large material-icons"><img style="margin:4px;" src="<?php echo base_url(); ?>public/img/ic_add_white_48px.svg" alt="menu" /></i>
    </a>
  </div>
  <?php endif; ?>
  <!-- Modal Tambah -->
  <div id="siswa-tambah-kelas" class="modal">
    <form class="form" action="<?php echo base_url() . index_page(); ?>/kelas/tambah" method="post">
      <div class="modal-content">
        <h4>Tambah Kelas</h4>
        <div class="input-field col s12">
          <input type="text" name="kelas-tambah-nama" id="kelas-tambah-nama" autofocus="true">
          <label for="kelas-tambah-nama">Nama Kelas</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Simpan</button>
      </div>
    </form>
  </div>
  <!-- Modal Edit -->
  <div id="siswa-edit-kelas" class="modal">
    <form class="form" action="<?php echo base_url() . index_page(); ?>/kelas/update" method="post">
      <div class="modal-content">
        <h4>Edit Kelas</h4>
        <div class="col s12">
          <input type="hidden" name="kelas-edit-id" id="kelas-edit-id">
          <label for="kelas-tambah-nama">Nama Kelas</label>
          <input type="text" name="kelas-edit-nama" id="kelas-edit-nama" autofocus="true">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Simpan</button>
      </div>
    </form>
  </div>
</div>
