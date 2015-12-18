<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {
   $username = $_POST['username'];
   $password = $_POST['password'];

   $result = $this->user->login($username, $password);

   if($result) {
     foreach ($result as $data) {
         $_SESSION['id'] = $data->id;
         $_SESSION['username'] = $data->username;
         $_SESSION['nama'] = $data->nama;
         $_SESSION['role'] = $data->role;
     }
     header('location:'.base_url());
   } else {
     $this->load->view('login_view');
   }
 }
}
