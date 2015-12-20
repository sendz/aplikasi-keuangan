<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Siswa
 */
class Siswa extends CI_Controller
{

  function __construct()
  {
    # code...
    parent::__construct();
    $this->load->model('model_kelas');
    $this->load->model('model_siswa');
    $this->load->model('model_pengaturan');
  }

  public function page()
  {
    $config = array();
    $config['base_url'] = base_url() . index_page() . "/siswa/page";
    $config['total_rows']  = $this->model_siswa->countSiswa();
    $config['per_page'] = 20;
    $config['uri_segment'] = 3;

    // pagination styling
    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = "</ul>";
    $config['first_link'] = "Awal";
    $config['last_link'] = "Akhir";
    $config['first_tag_open'] = "<li class='waves-effect'>";
    $config['first_tag_close'] = "</li>";
    $config['last_tag_open'] = "<li class='waves-effect'>";
    $config['last_tag_close'] = "</li>";
    $config['next_tag_open'] = "<li class='waves-effect'>";
    $config['next_tag_close'] = "</li>";
    $config['prev_tag_open'] = "<li class='waves-effect'>";
    $config['prev_tag_close'] = "</li>";
    $config['cur_tag_open'] = "<li class='active'><a href='#'>";
    $config['cur_tag_close'] = "</a></li>";
    $config['num_tag_open'] = "<li class='waves-effect'>";
    $config['num_tag_close'] = "</li>";

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['siswa'] = $this->model_siswa->pageSiswa($config['per_page'], $page);
    $data['links'] = $this->pagination->create_links();
    # code...
    // Get list of Kelas from DB
    $data['kelas']  = $this->model_kelas->namaKelas();
    $data['editkelas']  = $this->model_kelas->namaKelas();
    $data['kelas2']  = $this->model_kelas->namaKelas();
    // $data['siswa']  = $this->model_siswa->listSiswa();
    $data['pengaturan'] = $this->model_pengaturan->listPengaturan();
    // Views
    $this->load->view('head', $data);
    $this->load->view('nav', $data);
    $this->load->view('siswa', $data);
    $this->load->view('foot');
  }

  public function tambah() {
    $this->model_siswa->addSiswa();
  }

  public function update() {
    $this->model_siswa->updateSiswa();
  }

  public function kelas($by,$id) {
    $data['siswa']  = $this->model_siswa->find($by,$id);
    $this->load->view('optionsiswa',$data);
  }

  public function siswakelas($by, $id) {
    $data['siswa'] = $this->model_siswa->listById($by, $id);
    $this->load->view('tablesiswa',$data);
  }

  public function upload() {
    $this->model_siswa->uploadSiswa();
  }
}
