<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User extends CI_Model
{
 function login($username, $password)
 {
   $this->db->select('id, username, password, nama, role');
   $this->db->from('user');
   $this->db->where('username', $username);
   $this->db->where('password', MD5($password));
   $this->db->limit(1);

   $query = $this->db->get();

   return $query->result();
 }
}
