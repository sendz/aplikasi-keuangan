<div class="row">
  <div class="col s6">
    <div class="input-field col s6">
      <select class="" name="siswa-pilih-kelas" id="siswa-pilih-kelas">
        <option value="option">Pilih Kelas</option>
        <?php
        foreach ($kelas2 as $kelas2) :
          echo "<option value='".$kelas2->id."'>".$kelas2->tingkat." ".$kelas2->nama."</option>";
        endforeach;
        ?>
      </select>
    </div>
  </div>

  <?php if ($_SESSION['role'] == 1) : ?>
  <div class="col s5 offset-s1">
    <form class="" action="<?php echo base_url() . index_page(); ?>/siswa/upload" method="post" enctype="multipart/form-data">
      <div class="file-field input-field col s10">
        <div class="btn">
          <span>File</span>
          <input type="file" name="excel-file">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" placeholder="Upload Data Siswa CSV">
        </div>
      </div>
      <div class="input-field col s2">
        <input type="submit" class="btn waves-effect waves-light" value="Simpan" name="submit">
      </div>
    </form>
  </div>
  <?php endif; ?>
  <div class="col s12" id="table-siswa">
    <table class="stripped highlight responsive-table">
      <thead>
        <tr>
          <th>
            No. Induk
          </th>
          <th>
            Nama Siswa
          </th>
          <th>
            Kelas
          </th>
          <th>
            Alamat
          </th>
          <th>
            Nama Orang Tua
          </th>
          <th>
            Tahun Masuk
          </th>

          <?php if ($_SESSION['role'] == 1) : ?>
          <th style="width:150px;">
            Aksi
          </th>
        <?php endif; ?>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($siswa as $siswa) {
            echo "<tr>";
            echo "<td>";
            echo $siswa->nis;
            echo "</td><td>";
            echo $siswa->nama;
            echo "</td><td>";
            echo $siswa->tingkat . " " . $siswa->namakelas;
            echo "</td><td>";
            echo $siswa->alamat;
            echo "</td><td>";
            echo $siswa->orangtua;
            echo "</td><td>";
            echo $siswa->tahunmasuk;
            echo "</td>";

            if ($_SESSION['role'] == 1) :
            echo "<td>";
            echo "<a onClick='modalEditSiswa(".$siswa->id.",".$siswa->nis.",\"".$siswa->nama."\",".$siswa->idkelas.",\"".$siswa->alamat."\",\"".$siswa->orangtua."\",".$siswa->tahunmasuk.")' class='btn waves-effect waves-light'>Edit</a>";
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
    <a class="btn-floating btn-large red modal-trigger" href="#siswa-tambah-siswa">
      <i class="large material-icons"><img style="margin:4px;" src="<?php echo base_url(); ?>public/img/ic_add_white_48px.svg" alt="menu" /></i>
    </a>
  </div>
  <?php endif; ?>

  <!-- Modal Tambah Siswa -->
  <div id="siswa-tambah-siswa" class="modal">
    <form class="form" action="<?php echo base_url() . index_page(); ?>/siswa/tambah" method="post">
      <div class="modal-content">
        <h4>Tambah Siswa</h4>
        <div class="input-field col s12">
          <input type="text" name="siswa-tambah-nis" id="siswa-tambah-nis">
          <label for="siswa-tambah-nis">Nomor Induk</label>
        </div>
        <div class="input-field col s12">
          <input type="text" name="siswa-tambah-nama" id="siswa-tambah-nama">
          <label for="siswa-tambah-nama">Nama</label>
        </div>
        <div class="input-field col s12">
          <select class="" name="siswa-tambah-kelas">
            <option value="option" disabled selected>Kelas</option>
            <?php
            foreach ($kelas as $kelas) :
              echo "<option value='".$kelas->id."'>".$kelas->tingkat." ".$kelas->nama."</option>";
            endforeach;
            ?>
          </select>
          <label for="siswa-tambah-kelas">Kelas</label>
        </div>
        <div class="input-field col s12">
          <textarea name="siswa-tambah-alamat" class="materialize-textarea" id="siswa-tambah-alamat"></textarea>
          <label for="siswa-tambah-alamat">Alamat</label>
        </div>
        <div class="input-field col s12">
          <input type="text" name="siswa-tambah-orang-tua" id="siswa-tambah-orang-tua">
          <label for="siswa-tambah-orang-tua">Nama Orang Tua</label>
        </div>
        <div class="input-field col s12">
          <input type="number" name="siswa-tambah-tahun-masuk" id="siswa-tambah-tahun-masuk">
          <label for="siswa-tambah-tahun-masuk">Tahun Masuk</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">Simpan</button>
      </div>
    </form>
  </div>

  <!-- Modal Edit Siswa -->
  <div id="siswa-edit-siswa" class="modal">
    <form class="form" action="<?php echo base_url() . index_page(); ?>/siswa/update" method="post">
      <div class="modal-content">
        <h4>Edit Siswa</h4>
        <div class="col s12">
          <label for="siswa-edit-nis">Nomor Induk</label>
          <input type="hidden" name="siswa-edit-id" id="siswa-edit-id">
          <input type="text" name="siswa-edit-nis" id="siswa-edit-nis">
        </div>
        <div class="col s12">
          <label for="siswa-edit-nama">Nama</label>
          <input type="text" name="siswa-edit-nama" id="siswa-edit-nama">
        </div>
        <div class="col s12">
          <label for="siswa-edit-kelas">Kelas</label>
          <select class="browser-default" name="siswa-edit-kelas" id="siswa-edit-kelas">
            <option value="option" disabled selected>Kelas</option>
            <?php
            foreach ($editkelas as $editkelas) :
              echo "<option value='".$editkelas->id."'>".$editkelas->tingkat." ".$editkelas->nama."</option>";
            endforeach;
            ?>
          </select>
        </div>
        <div class="col s12">
          <label for="siswa-edit-alamat">Alamat</label>
          <textarea name="siswa-edit-alamat" class="materialize-textarea" id="siswa-edit-alamat"></textarea>
        </div>
        <div class="col s12">
          <label for="siswa-edit-orang-tua">Nama Orang Tua</label>
          <input type="text" name="siswa-edit-orang-tua" id="siswa-edit-orang-tua">
        </div>
        <div class="col s12">
          <label for="siswa-edit-tahun-masuk">Tahun Masuk</label>
          <input type="number" name="siswa-edit-tahun-masuk" id="siswa-edit-tahun-masuk">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">Simpan</button>
      </div>
    </form>
  </div>
</div>
