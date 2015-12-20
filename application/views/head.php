<?php
  if(!$_SESSION['username']) {
    header('location:'.base_url().index_page().'/login');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php
      echo $this->config->item('site_name');
      foreach ($pengaturan as $pengaturan) {
        echo " " . $pengaturan->namasekolah;
      }
    ?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/materialize.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css" media="screen" title="no title" charset="utf-8">
    <style>
      @media print {
        nav, .fixed-action-btn, #tambah-pengeluaran, #pengeluaran-tambah {
          display: none;
        }
        .print {
          display: block !important;
        }
        table th, table td {
          border: 1px solid black;
        }
      }
    </style>
  </head>
  <body>
