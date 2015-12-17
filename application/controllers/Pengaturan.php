<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Index
 */
class Pengaturan extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('model_pengaturan');
  }

  function index() {
    $data['pengaturan'] = $this->model_pengaturan->listPengaturan();
    $data['biaya']      = $this->model_pengaturan->biayaPendidikan();
    $this->load->view('head', $data);
    $this->load->view('nav', $data);
    $this->load->view('pengaturan', $data);
    $this->load->view('foot');
  }
  function simpan() {
    $this->model_pengaturan->updatePengaturan();
  }
}
