<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Login extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	}

	public function index() {
		if($this->session->userdata('login')){
			redirect("admin/dashboard");
		} else {
			redirect("login/login");
		}
	}

	public function view($file){
		$this->session->set_userdata('subwebsite', "Login");
		$data['file'] = "admin/login/index";
		$this->load->view('admin/themplate-depan', $data);
	}
	
	public function cek_login(){
		$login = $this->modeladmin->check_login($this->input->post('kontak'), $this->input->post('password'));
		if ($login){
            $this->session->set_userdata('id', $login[0]['id']);
            $this->session->set_userdata('nama', $login[0]['nama']);
            $this->session->set_userdata('username', $login[0]['username']);
            $this->session->set_userdata('photo', $login[0]['photo']);
            $this->session->set_userdata('nomor_telepone', $login[0]['nomor_telepone']);
            $this->session->set_userdata('role', $login[0]['role']);
            $this->session->set_userdata('login', 1);
			$menu = $this->modeladmin->ambil_menu($login[0]['role']);
            $this->session->set_userdata('menu', $menu);
			redirect("admin/dashboard");
		}			
		redirect("admin");
	}

}

