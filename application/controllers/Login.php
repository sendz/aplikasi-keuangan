<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('model_pengaturan');
 }

 function index()
 {

   $data['pengaturan'] = $this->model_pengaturan->listPengaturan();
   $this->load->helper(array('form'));
   $this->load->view('login_view',$data);
 }
 function logout() {
   // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
    header('location:'.base_url().index_page().'/login');
 }

}
