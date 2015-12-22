<table class="striped highlight">
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
      <th style="width:150px;">
        Aksi
      </th>
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
        echo "</td><td>";
        echo "<a onClick='modalEditSiswa(".$siswa->id.",".$siswa->nis.",\"".$siswa->nama."\",".$siswa->idkelas.",\"".$siswa->alamat."\",\"".$siswa->orangtua."\",".$siswa->tahunmasuk.")' class='btn waves-effect waves-light'>Edit</a>";
        echo "</td></tr>";
      }
    ?>
  </tbody>
</table>
