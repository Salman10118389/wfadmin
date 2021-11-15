<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Admin extends CI_Controller {


	public function __construct(){
	    parent::__construct();
		$this->session->set_userdata('website', "Admin");
	    if(!$this->session->userdata('id')){
			redirect("login/index");
	    }
	}

	//--------------------------------------------------------- login
	public function index() {
		if($this->session->userdata('login')){
			redirect("admin/dashboard");
		} else {
			redirect("admin/login");
		}
	}

	public function viewsss($folder, $file, $data1, $data2){
		$this->session->set_userdata('subwebsite', $folder);
		$this->session->set_userdata('id_detail', $data1);
		$data['file'] = "admin/".$folder."/".$file;
		$this->load->view('admin/themplate', $data);
	}

	public function viewss($folder, $file, $id){
		$this->session->set_userdata('subwebsite', $folder);
		$this->session->set_userdata('id_detail', $id);
		if($file == "hapus-admin"){
			$file = './gambar/'.$this->input->post('jenis').'/'.$this->input->post('gambar');
			unlink($file);
			$hapus = $this->modeladmin->hapus_admin($id);
            return $hapus;
		}else{
			$data['file'] = "admin/".$folder."/".$file;
			$this->load->view('admin/themplate', $data);
		}
	}

	public function views($folder, $file){
		$this->session->set_userdata('subwebsite', $folder);
		$data['file'] = "admin/".$folder."/".$file;	
		if($file == "login" || $file == "kunci" || $file == "lupa-password"){
			$this->load->view('admin/themplate-depan', $data);
		}else{
			$this->load->view('admin/themplate', $data);
		}
	}

	public function view($file){
		$this->session->set_userdata('subwebsite', $file);
		$data['file'] = "admin/".$file."/index";
		if($file == "logout"){
			$this->session->sess_destroy();
			redirect("admin/login");
		}else if($file == "login" || $file == "kunci"){
			$this->load->view('admin/themplate-depan', $data);
		}else{
			$this->load->view('admin/themplate', $data);	
		}
	}
	
	public function cek_lupa_password(){
		$status = $this->modeladmin->cek_admin_exis($this->input->post('kontak'));
		if($status){
			return true;
		}else{
			return false;
		}
	}

	public function buka_kunci(){
		$kontak = $this->session->userdata('email');
		if(!$kontak){
			$kontak = $this->session->userdata('nomor_telepone');
		}
        $login = $this->modelkunci->buka_kunci($kontak, $this->input->post('password'));
		if ($login){
            $this->session->set_userdata('login', 1);
			redirect($this->session->userdata('last_url'));
		}else{
			redirect("admin/kunci");
		}
	}

	//------------------------------------------------------------------------------------------------- crud global
	public function simpan_gambar(){
		$nama = md5(rand()); 
		$data = $this->input->post('gambar');
		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);
		$status = file_put_contents('./gambar/'.$this->input->post('jenis').'/'.$nama.'.jpg', $data);
		if ($this->input->post('gambarsebelumnya') != ""){
			$file = './gambar/'.$this->input->post('jenis').'/'.$this->input->post('gambarsebelumnya');
			unlink($file);
		}
		print_r($nama.'.jpg');
	}


	public function tambah_data()  
	{
		$jenis = $this->input->post('jenis');
		$kategori = $this->input->post('kategori');
		$data_insert = [];
		if ($jenis ==  "admin"){
	        $tabel = "admin_".$jenis;
	        $data_insert = array(
	            'nama' => $this->input->post('nama'),
	            'username' => $this->input->post('username'),
	            'photo' => $this->input->post('nama_photo'),
	            'nomor_telepone' => $this->input->post('handphone'),
	            'role' => $this->input->post('role'),
	            'catatan' => $this->input->post('catatan')
	        );
	        $result = $this->modeladmin->tambah_data($tabel, $data_insert, $jenis);
	        redirect('admin/data-'.$jenis);
		}
		elseif ($jenis == "konten" && $kategori == "slider"){
			
			$tabel = "web_".$kategori;
			$data_insert = array(
	            'nama' => $this->input->post('nama'),
	            'link' => $this->input->post('link'),
	            'gambar' => $this->input->post('nama_gambar'),
	            'created_by' => "1"
	        );
	        $result = $this->modeladmin->tambah_data($tabel, $data_insert, $jenis, $kategori);
	        redirect('admin/data-'.$jenis."/".'data-'.$kategori.'s');
		}
       
    	
    }


	public function ubah_data()  
	{
		$jenis = $this->input->post('jenis');
		$tabel = "admin_".$jenis;
		$data_insert = [];
		$where = "id";
		$id = $this->input->post('id');

		if ($jenis ==  "admin"){
	        $data_insert = array(
	            'nama' => $this->input->post('nama'),
	            'username' => $this->input->post('username'),
	            'photo' => $this->input->post('nama_photo'),
	            'nomor_telepone' => $this->input->post('handphone'),
	            'role' => $this->input->post('role'),
	            'catatan' => $this->input->post('catatan')
	        );
		}

        $result = $this->modeladmin->ubah_data($tabel, $data_insert, $jenis, $id, $where);
    	redirect('admin/data-'.$jenis);
    }

    public function hapus_data(){
    	$jenis = $this->input->post('jenis');
    	$kategori = $this->input->post('kategori');
    	if ($jenis == "admin") {
    		$data["id"] = $this->input->post('id');
	    	$data["nama"] = $this->input->post('nama');
	    	$tabel = "admin_".$this->input->post('jenis');
	    	if($this->input->post('jenis') == "operasional"){
    			$tabel = "biaya_operasional";
    		}
    	}
    	elseif($kategori == "slider" ){
    		$data["id"] = $this->input->post('id');
	    	$data["nama"] = $this->input->post('nama');
	    	$tabel = "web_".$this->input->post('kategori');
    	}
        $result = $this->modeladmin->hapus_data($tabel, $data, $kategori);
        return $result;
    }


	// ------------------------------------------------------------------------------ CRUD All Menu
	public function upload_menu_all($type_menu)  
	{
        $data_insert = $this->input->post();
	    $parent = $this->input->post("id_parent");
        if($parent == null){
        	$parent = 0;
        }
        $urutan = $this->input->post("urutan");

        $result = $this->modeladmin->tambah_menu_all($data_insert, $parent, $urutan, $type_menu);
		$menu = $this->modeladmin->ambil_menu($this->session->userdata('role'));
        $this->session->set_userdata('menu', $menu);
		$this->session->set_userdata($type_menu, "in");
        redirect('admin/developer/menu');
	}

	public function inactive_menu_all($id, $type_menu){
        $result = $this->modeladmin->inactive_menu_all($id, $type_menu);
		$menu = $this->modeladmin->ambil_menu($this->session->userdata('role'));
		$this->session->set_userdata($type_menu, "in");
        $this->session->set_userdata('menu', $menu);
        redirect('admin/developer/menu');
	}

	public function active_menu_all($id, $type_menu){
        $result = $this->modeladmin->active_menu_all($id, $type_menu);
		$menu = $this->modeladmin->ambil_menu($this->session->userdata('role'));
		$this->session->set_userdata($type_menu, "in");
        $this->session->set_userdata('menu', $menu);
        redirect('admin/developer/menu');
	}

	public function hapus_menu_all($id, $urutan, $parent, $type_menu){
        $result = $this->modeladmin->hapus_menu_all($id, $urutan, $parent, $type_menu);
		$this->session->set_userdata($type_menu, "in");
        redirect('admin/developer/menu');
	}

	

























}