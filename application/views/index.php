<div class="row">
  <div class="col s12">
    <div class="input-field col s12">
      <input type="text" name="search-siswa" value="" id="search-siswa">
      <label for="search-siswa">Pencarian Siswa</label>
    </div>
    <div class="input-field col s6">
      <select class="" name="search-kelas" id="search-kelas">
        <option value="" disabled selected>Pilih Kelas</option>
        <?php
        foreach ($kelas as $kelas) :
          echo "<option value='".$kelas->id."'>".$kelas->tingkat." ".$kelas->nama."</option>";
        endforeach;
        ?>
      </select>
      <label for="search-kelas">Pilih Kelas</label>
    </div>
    <div class="input-field col s6">
      <select class="" name="search-tahun-ajaran" id="search-tahun-ajaran">
        <option value="option" disabled selected>Tahun Ajaran</option>
        <option value="2015-2016">2015-2016</option>
      </select>
    </div>
    <div class="input-field col s12">
      <button type="button" name="search-action-do" id="search-action-do" class="btn waves-effect waves-light right">Cari</button>
    </div>
  </div>
</div>
