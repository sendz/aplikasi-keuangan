<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Index
 */
class Pengeluaran extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('model_pengeluaran');
    $this->load->model('model_pengaturan');
  }

  public function index()
  {
    # code...
    $data['pengeluaran'] = $this->model_pengeluaran->listPengeluaran();
    $data['pengaturan'] = $this->model_pengaturan->listPengaturan();
    $this->load->view('head', $data);
    $this->load->view('nav', $data);
    $this->load->view('pengeluaran', $data);
    $this->load->view('foot');
  }

  public function tambah() {
    $this->model_pengeluaran->addPengeluaran();
  }
}
