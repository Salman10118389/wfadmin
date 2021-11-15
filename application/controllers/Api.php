<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// session_start();
date_default_timezone_set("Asia/Jakarta");
require APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller{

	public function __construct(){
	    parent::__construct();
	}

	public function index_get(){
	    $response['status']="success";
	    $response['error']=false;
	    $response['data']='Rest Api Sempel';
	    $this->response($response);
	}

	// API CRUD Menu Admin
	public function ambil_menu_admin_get(){
		// $optional = $this->parameter();
		// $data = $this->modeladmin->ambil_data("page_menu_admin", $optional);
        $data = $this->modeladmin->ambil_menu_all('admin_menu');
		if(count($data)){
		    $response['status']="success";
		    $response['error']=false;
		    $response['data']=$data;
		    $this->response($response);
		}else{
		    $response['status']="failed";
		    $response['error']=true;
		    $response['data']='Gagal Ambil Menu Admin';
		    $this->response($response);
		}
	}

	public function tambah_menu_admin_post(){
		$status = $this->modeladmin->tambah_data("page_menu_admin", $_POST, "menu_admin");
		if($status){
		    $response['status']="success";
		    $response['error']=false;
		    $response['data']='Berhasil Tambah Logo';
		    $this->response($response);
		}else{
		    $response['status']="failed";
		    $response['error']=true;
		    $response['data']='Gagal Tambah Logo';
		    $this->response($response);
		}
	}

	public function hapus_menu_admin_post(){
		$status = $this->modeladmin->hapus_data("page_menu_admin", $_POST, "menu_admin");
		if($status){
		    $response['status']="success";
		    $response['error']=false;
		    $response['data']='Berhasil Hapus menu_admin';
		    $this->response($response);
		}else{
		    $response['status']="failed";
		    $response['error']=true;
		    $response['data']='Gagal Hapus menu_admin';
		    $this->response($response);
		}
	}

	public function ubah_menu_admin_post(){
		$status = $this->modeladmin->ubah_data("page_menu_admin", $_POST, "menu_admin", $_POST['id']);
		if($status){
		    $response['status']="success";
		    $response['error']=false;
		    $response['data']='Berhasil Ubah Logo';
		    $this->response($response);
		}else{
		    $response['status']="failed";
		    $response['error']=true;
		    $response['data']='Gagal Ubah Logo';
		    $this->response($response);
		}
	}

	public function ambil_submenu_admin_get($id){
		// $optional = $this->parameter();
		// $data = $this->modeladmin->ambil_data("page_menu_admin", $optional);
        $data = $this->modeladmin->ambil_submenu_all($id, "admin_menu");
	    $response['status']="success";
	    $response['error']=false;
	    $response['data']=$data;
	    $this->response($response);
	}

	public function api_data_get($a){
        $data = $this->modeladmin->ambil_submenu_all($id, "admin_menu");
	    $response['status']="success";
	    $response['error']=false;
	    $response['data']=$data;
	    $this->response($response);
	}

	public function api_baca_data_get($nama_table, $nama_field, $nilai_field){
		$optional = [];		
        $optional['select'] = "";
		if ($nilai_field == "semuanya"){
	        $optional['where'] = "";
		} else {
	        $whare["field"][0] = str_replace("-","_",$nama_field);
	        $whare["velue"][0] = $nilai_field; 
	        $optional['where'] = $whare;			
		}

        $optional['search'] = "";
        $optional['join'] = "";
        $optional['order_by'] = "";
        $optional['limit'] = "";
        $optional['offset'] = "";
        $optional['distinct'] = "";
        $data = $this->modeladmin->ambil_data(str_replace("-","_",$nama_table),$optional);

	    $response['status']="success";
	    $response['error']=false;
	    $response['data']=$data;
	    $this->response($response);
	}


	public function api_tambah_data_post($table){
	    $response['status']="oke";
	    $response['error']=false;
	    $this->response($response);
	}

	public function api_ubah_data_post($table){
	    $response['status']=$result;
	    $response['error']=false;
	    $this->response($response);
	}

	public function api_hapus_data_post($table){
		$tabel = str_replace("-", "_", $table);
		$data["id"] = $_POST["id"];
		$status = $this->modeladmin->hapus_data($tabel, $data, "");
	    $response['status']="success";
	    $response['error']=false;
	    $this->response($response);
	}
}