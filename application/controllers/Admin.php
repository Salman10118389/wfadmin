<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Admin extends CI_Controller {


	public function __construct(){
	    parent::__construct();    
        $this->load->helper(array('form', 'url'));
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

	function upload_image(){
	    if(isset($_FILES["image"]["name"])){
			$jenis = $this->input->post('jenis');
			$namaGambar = strtolower(str_replace(" ", "-", $this->input->post('namaGambar')."-".rand(1,10000)));
	    	$this->load->helper('file');
			$image_path = realpath(APPPATH . '../gambar/'.$jenis."/");
	        $config['upload_path'] = $image_path;
	        $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name']     = $namaGambar;
	        $this->upload->initialize($config);
	        if(!$this->upload->do_upload('image')){
	            $this->upload->display_errors();
	            return FALSE;
	        }else{
	            $data = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']= $image_path.$data['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= TRUE;
	            $config['quality']= '60%';
	            $config['width']= 800;
	            $config['height']= 800;
	            $config['new_image']= $image_path.$data['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();
	            echo base_url(). '/gambar/'.$jenis."/".$namaGambar.".jpg";
	        }
	    }
	}

	function delete_image(){
	    $src = $this->input->post('src');
	    $file_name = str_replace(base_url(), '', $src);
	    if(unlink($file_name)){
	        echo 'File Delete Successfully';
	    }
	}

	public function tambah_data()  
	{
		$jenis = $this->input->post('jenis');
		$kategori = $this->input->post('kategori');
		$data_insert = [];
		if ($jenis ==  "admin"){
	        $tabel = "admin_".$jenis;

	        $url = "data-detail-".strtolower(str_replace(" ", "-", $this->input->post('nama')))."-".str_replace(" ", "-", strtolower($this->input->post('jabatan')))."-warung-freelancer";
			
			$this->load->helper('file');
			$image_path = realpath(APPPATH . '../gambar/'.$jenis."/");
			$config['upload_path']          = $image_path;
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $url;
			$config['overwrite']            = true;
			// $config['max_size']             = 1024; // 1MB
			// $config['max_width']            = 1080;
			// $config['max_height']           = 1080;
            $this->load->library('upload');
            $this->upload->initialize($config);
			$this->upload->do_upload('photo');

			$optional = [];
            $optional['select'] = "";
            $where["field"][0] = "nama";
            $where["velue"][0] = $this->input->post('jabatan'); 
            $optional['where'] = $where;
            $optional['search'] = "";
            $optional['distinct'] = "";
            $optional['join'] = "";
            $optional['order_by'] = "";
            $optional['limit'] = "";
            $optional['offset'] = "";
            $data = $this->modeladmin->ambil_data("web_kategori",$optional); 

			$data_insert = array(
	            'nama' 				=> $this->input->post('nama'),
	            'username' 			=> $this->input->post('username'),
	            'photo' 			=> $url.".jpg",
	            'jabatan' 			=> $this->input->post('jabatan'),
	            'aktif' 			=> $this->input->post('aktif'),
	            'catatan'		 	=> $this->input->post('catatan'),
	            'link'		 		=> $url,
	            'slider'		 	=> $data[0]["gambar"],
	            'slider_potrait'	=> $data[0]["gambar_potrait"],
	            'password'			=> "test1234"
	        );


	        $result = $this->modeladmin->tambah_data($tabel, $data_insert, $jenis);
	        redirect('admin/data-'.$jenis);
		} else if ($jenis == "jasa" ){
			$tabel = "web_".$jenis;

	        $urlSlider = strtolower(str_replace(" ", "-", $this->input->post('judul')))."-slider";
			$this->load->helper('file');
			$image_path = realpath(APPPATH . '../gambar/'.$jenis."/");
			$config['upload_path']          = $image_path;
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $urlSlider;
			$config['overwrite']            = true;
			// $config['max_size']             = 1024; // 1MB
			// $config['max_width']            = 1080;
			// $config['max_height']           = 1080;
            $this->load->library('upload');
            $this->upload->initialize($config);
			$this->upload->do_upload('slider');

			$urlSliderPotrait = strtolower(str_replace(" ", "-", $this->input->post('judul')))."-slider-potrait";
			$this->load->helper('file');
            $config['file_name'] = $urlSliderPotrait;
            $this->upload->initialize($config);
			$this->upload->do_upload('slider-potrait');

			$urlGambar = strtolower(str_replace(" ", "-", $this->input->post('judul')));
			$this->load->helper('file');
            $config['file_name'] = $urlGambar;
            $this->upload->initialize($config);
			$this->upload->do_upload('gambar');

			$data_insert = array(
	            'judul' 				=> $this->input->post('judul'),
	            'deskripsi_judul' 		=> $this->input->post('deskripsi'),
	            'gambar' 				=> $urlGambar.".jpg",
	            'gambar_header_potrait' => $urlSliderPotrait.".jpg",
	            'gambar_header' 		=> $urlSlider.".jpg",
	            'kategori_id' 			=> $this->input->post('kategori_id'),
	            'favorit' 				=> $this->input->post('favorit'),
	            'isi_artikel'		 	=> $this->input->post('artikel'),
	            'link'		 			=> $urlGambar
	        );

	        $result = $this->modeladmin->tambah_data($tabel, $data_insert, $jenis);

	        redirect('admin/konten-utama/konten-'.$jenis);


		}else if ($jenis == "artikel" ){
			$tabel = "web_".$jenis;

	        $urlSlider = "artikel-".strtolower(str_replace(" ", "-", $this->input->post('judul')))."-slider";
			$this->load->helper('file');
			$image_path = realpath(APPPATH . '../gambar/'.$jenis."/");
			$config['upload_path']          = $image_path;
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $urlSlider;
			$config['overwrite']            = true;
			// $config['max_size']             = 1024; // 1MB
			// $config['max_width']            = 1080;
			// $config['max_height']           = 1080;
            $this->load->library('upload');
            $this->upload->initialize($config);
			$this->upload->do_upload('slider');

			$urlSliderPotrait = "artikel-".strtolower(str_replace(" ", "-", $this->input->post('judul')))."-slider-potrait";
			$this->load->helper('file');
            $config['file_name'] = $urlSliderPotrait;
            $this->upload->initialize($config);
			$this->upload->do_upload('slider-potrait');

			$urlGambar = "artikel-".strtolower(str_replace(" ", "-", $this->input->post('judul')));
			$this->load->helper('file');
            $config['file_name'] = $urlGambar;
            $this->upload->initialize($config);
			$this->upload->do_upload('gambar');

			$data_insert = array(
	            'judul' 				=> $this->input->post('judul'),
	            'deskripsi_judul' 		=> $this->input->post('deskripsi'),
	            'gambar' 				=> $urlGambar.".jpg",
	            'gambar_header_potrait' => $urlSliderPotrait.".jpg",
	            'gambar_header' 		=> $urlSlider.".jpg",
	            'kategori_id' 			=> $this->input->post('kategori_id'),
	            'favorit' 				=> $this->input->post('favorit'),
	            'isi_artikel'		 	=> $this->input->post('artikel'),
	            'link'		 			=> $urlGambar
	        );

	        $result = $this->modeladmin->tambah_data($tabel, $data_insert, $jenis);

	        redirect('admin/konten-utama/konten-'.$jenis);


		}else if ($jenis == "konten" && $kategori == "slider"){
			
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
		if ($jenis == "Admin"){
			$tabel = "admin_".$jenis;
			$data_insert = [];
			$where = "id";
			$id = $this->input->post('id');

			if (!$_FILES['photo']['size'] == 0 && !$_FILES['photo']['error'] == 0){
			    $this->load->helper('file');
				$image_path = realpath(APPPATH . '../gambar/'.$jenis."/");
				$config['upload_path']          = $image_path;
	            $config['allowed_types']        = 'gif|jpg|png';
	            $config['file_name']            = $this->input->post('link');
				$config['overwrite']            = true;
				// $config['max_size']             = 1024; // 1MB
				// $config['max_width']            = 1080;
				// $config['max_height']           = 1080;
	            $this->load->library('upload');
	            $this->upload->initialize($config);
				$this->upload->do_upload('photo');
			} 

			if ($jenis ==  "admin"){
		        $data_insert = array(
		        'nama' 				=> $this->input->post('nama'),
	            'username' 			=> $this->input->post('username'),
	            'photo' 			=> $url.".jpg",
	            'jabatan' 			=> $this->input->post('jabatan'),
	            'aktif' 			=> $this->input->post('aktif'),
	            'catatan'		 	=> $this->input->post('catatan'),
	            'link'		 		=> $url,
	            'slider'		 	=> $data[0]["gambar"],
	            'slider_potrait'	=> $data[0]["gambar_potrait"],
	            'password'			=> "test1234"
		        );
			}

	        $result = $this->modeladmin->ubah_data($tabel, $data_insert, $jenis, $id, $where);
	    	redirect('admin/data-'.$jenis);			
		}
    }

    public function hapus_data(){
    	$jenis = $this->input->post('jenis');
    	$kategori = $this->input->post('kategori');
    	if ($jenis == "admin") {
    		$data["id"] = $this->input->post('id');
	    	$data["nama"] = $this->input->post('nama');
	    	$tabel = "admin_".$this->input->post('jenis');
    	}else if($jenis == "slider" ){
    		$data["id"] = $this->input->post('id');
	    	$data["nama"] = $this->input->post('nama');
	    	$tabel = "web_".$this->input->post('jenis');
    	}else if($jenis == "artikel" ){
    		$data["id"] = $this->input->post('id');
	    	$data["nama"] = $this->input->post('nama');
	    	$tabel = "web_".$this->input->post('jenis');
    	}else if($jenis == "jasa" ){
    		$data["id"] = $this->input->post('id');
	    	$data["nama"] = $this->input->post('nama');
	    	$tabel = "web_".$this->input->post('jenis');
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