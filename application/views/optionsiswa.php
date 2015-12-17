<?php
  $options = '';
  foreach ($siswa as $data) {
    $options .= "<option value='$data->id'>$data->nama</options>";
  }
  echo $options;
