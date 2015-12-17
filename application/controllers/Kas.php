<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Class Index
 */
class Kas extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('model_kas');
    $this->load->model('model_pengaturan');
  }

  public function saldo() {
    $data['transaksi'] = $this->model_kas->transaksi();
    $data['pengaturan'] = $this->model_pengaturan->listPengaturan();
    $this->load->view('head', $data);
    $this->load->view('nav', $data);
    $this->load->view('saldo', $data);
    $this->load->view('foot');
  }
}
