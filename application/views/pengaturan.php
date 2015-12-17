<div class="row">
  <div class="col s12 center">
    <table style="width: 60%; margin: auto;">
      <form class="form" action="<?php echo base_url() . index_page(); ?>/pengaturan/simpan" method="post">
        <?php foreach ($pengaturan as $pengaturan) : ?>
      <tr>
        <th style="width: 30%;">
          Nama Kepala Madrasah
        </th>
        <td>
          <input type="text" name="pengaturan-kepala-madrasah" value="<?php echo $pengaturan->kepalamadrasah; ?>">
        </td>
      </tr>
      <tr>
        <th>
          Nama Madrasah
        </th>
        <td>
          <input type="text" name="pengaturan-nama-sekolah" value="<?php echo $pengaturan->namasekolah; ?>">
        </td>
      </tr>
      <tr>
        <th>
          Alamat Sekolah
        </th>
        <td>
          <textarea name="pengaturan-alamat-sekolah" class="materialize-textarea"><?php echo $pengaturan->alamatsekolah; ?></textarea>
        </td>
      </tr>
      <tr>
        <th>
          Nama Bendahara
        </th>
        <td>
          <input type="text" name="pengaturan-nama-bendahara" value="<?php echo $pengaturan->namabendahara; ?>">
        </td>
      </tr>
      <tr>
        <th>
          Tahun Ajaran
        </th>
        <td>
          <input type="number" name="pengaturan-tahun-ajaran" value="<?php echo $pengaturan->tahunajaran; ?>">
        </td>
      </tr>
    <?php endforeach; ?>
      <tr>
        <th colspan="2">
          Biaya Pendidikan
        </th>
      </tr>

      <?php foreach($biaya as $biaya) : ?>
      <tr>
        <th>
          Tingkat <?php echo $biaya->tingkat; ?>
        </th>
        <td>
          <input type="number" name="biaya-pendidikan-<?php echo $biaya->tingkat; ?>" value="<?php echo $biaya->jumlah; ?>">
        </td>
      </tr>
    <?php endforeach; ?>
      <tr>
        <td colspan="2">
          <button type="submit" name="submit-pengaturan" class="btn waves-effect waves-light right">Simpan</button>
        </td>
      </tr>
      </form>
    </table>
  </div>
</div>
