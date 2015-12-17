<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Index
 */
class Index extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('model_kelas');
    $this->load->model('model_pengaturan');
  }

  public function index()
  {
    $data['kelas']  = $this->model_kelas->namaKelas();
    $data['pengaturan'] = $this->model_pengaturan->listPengaturan();
    # code...
    $this->load->view('head', $data);
    $this->load->view('nav', $data);
    $this->load->view('index', $data);
    $this->load->view('foot');
  }
}
