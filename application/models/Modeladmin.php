<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modeladmin extends CI_Model{
    
    public function ambil_data($table, $optional){

        if($optional['select']){
            $this->db->select($optional['select']);
        } else {
            $this->db->select('*');
        }

        $this->db->from($table);

        if($optional['where']){
            // $this->db->where('id', $id);
            $where = $optional['where'];
            for ($i = 0; $i < count($where["field"]) ; $i ++){
                $this->db->where($where["field"][$i], $where["velue"][$i]);
            } 
        }

        if($optional['search']){
            // $this->db->like('', $search);
            $search = $optional['search'];
            for ($i = 0; $i < count($search["field"]) ; $i ++){
                $this->db->like($search["field"][$i], $search["velue"][$i]);
            }
        }

        if($optional['join']){
            // $this->db->join('produk_list_kategori', 'produk_list_kategori.id = produk_list.id_daftar_kategori');
            $join = $optional['join'];
            for ($i = 0; $i < count($join["table"]) ; $i ++){
                $this->db->join($join["table"][$i], $join["where"][$i], 'left');
            } 

        }

        if($optional['order_by']){
            $this->db->order_by($optional['order_by'], 'ASC');
        }

        if($optional['limit']){
            // $this->db->limit(12);
        }

        if($optional['offset']){
            // $this->db->offset($offset);
        }

        if($optional['distinct']){
            $this->db->distinct();
        } 

        $data = $this->db->get()->result_array();
        return $data;
    }

    // public function detail_kategori($where)
    // {   
    //     return $this->db->get_where('web-kategori', array('id' => $where))->row_array();
    // }

    public function tambah_data($table, $data, $type){
        $data = $this->db->INSERT($table, $data);
        if ($type != "") {
            if($data){
                $this->notif('success', 'Berhasil Menambah '.$type, "Tambah ".$type." ".$data['nama']." berhasil");
            }else{
                $this->notif('error', 'Gagal Menambah '.$type, "Tambah ".$type." ".$data['nama']." berhasil");
            }

        }
        return $data;
    }

    public function hapus_data($table, $data, $type){
        $this->db->where('id', $data['id']);
        $hapus = $this->db->delete($table);
        if ($type != "") {
            if($hapus){
                $this->notif('success', 'Berhasil Menghapus '.$type, "Hapus ".$type." ".$data['nama']." berhasil");
            }else{
                $this->notif('error', 'Gagal Menghapus '.$type, "Hapus ".$type." ".$data['nama']." berhasil");
            }
        }
        return $hapus;
    }

    public function ubah_data($table, $data, $type, $id, $where){
        $this->db->where($where.' =', $id);
        $data = $this->db->UPDATE($table, $data);
        if ($type != "") {
            if($data){
                $this->notif('success', 'Berhasil Mengubah '.$type, "Ubah ".$type." ".$data['nama']." berhasil");
            }else{
                $this->notif('error', 'Gagal Mengubah '.$type, "Ubah ".$type." ".$data['nama']." berhasil");
            }
        }
        return $data;
    }























    // ----------------------------------------------------------------------------------------- bisa diconvert
    // public function daftar_admin(){
    //     $this->db->select('*');
    //     $this->db->from('admin_user');
    //     $data = $this->db->get()->result_array();
    //     return $data;
    // }

    public function ambil_admin($id){
        $this->db->select('*');
        $this->db->from('admin_user');
        $this->db->where('id', $id);
        $data["data"] = $this->db->get()->result_array();
        return $data;
    }

    public function cek_admin_exis($email){
        $this->db->select('*');
        $this->db->from('admin_user');
        $this->db->where('email', $email);
        $data["data"] = $this->db->get()->result_array();
        return $data;
    }

    public function tambah_admin($data){
        $data = $this->db->INSERT('admin_user', $data);
        return $data;
    }

    public function hapus_admin($id){
        $this->db->where('id', $id);
        $hapus = $this->db->delete('admin_user');
        if($hapus){
            $this->session->set_userdata('notif', 1);
            $this->session->set_userdata('type_notif', 'success');
            $this->session->set_userdata('title_notif', 'Berhasil Menghapus');
            $this->session->set_userdata('pesan_notif', "Hapus admin ".$this->input->post('nama')." berhasil");
        }else{
            $this->session->set_userdata('notif', 1);
            $this->session->set_userdata('type_notif', 'error');
            $this->session->set_userdata('title_notif', 'Gagal Menghapus');
            $this->session->set_userdata('pesan_notif', "Hapus admin ".$this->input->post('nama')." gagal");
        }
        return $data;
    }

    public function ambil_logo(){
        $this->db->select('*');
        $this->db->from("admin_logo");
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function ambil_role(){
        $this->db->select('*');
        $this->db->from("admin_role");
        $data = $this->db->get()->result_array();
        return $data;    
    }

    public function ambil_menu($role){
        $this->db->select('*');
        $this->db->from("admin_menu");
        $this->db->where('status', "active");
        $this->db->where('id_role', $role);
        $this->db->where('id_parent', 0);
        $this->db->order_by('urutan', 'asc');
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function ambil_submenu($id_menu){
        $this->db->select('*');
        $this->db->from("admin_menu");
        $this->db->where('status', "active");
        $this->db->where('id_parent', $id_menu);
        $this->db->order_by('urutan', 'asc');
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function check_link($link){
        // $this->db->select('*');
        // $this->db->from("admin_menu");
        // $this->db->where('link', $link);
        // $hasil = $this->db->get()->result_array();

        // $this->db->select('*');
        // $this->db->from("admin_menu");
        // $this->db->where('id_paren', $hasil['id']);
        // $data = $this->db->get()->result_array();
        // return $data
    }

    //----------------------------------------------------------------------- Proses CRUD semua menu
    public function ambil_menu_all($tipe_menu){
        $this->db->select('*');
        $this->db->from($tipe_menu);
        $this->db->where('id_parent', 0);
        $this->db->order_by('urutan', 'asc');
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function ambil_submenu_all($id_menu, $tipe_menu){
        $this->db->select('*');
        $this->db->from($tipe_menu);
        $this->db->where('id_parent', $id_menu);
        $this->db->order_by('urutan', 'asc');
        $data = $this->db->get()->result_array();
        return $data;
    }

    public function tambah_menu_all($data_insert, $parent, $urutan, $tipe_menu){
        $this->db->set('urutan', 'urutan+1', FALSE);
        $this->db->where('id_parent =', $parent);
        $this->db->where('urutan >=', $urutan);
        $this->db->update($tipe_menu);
        $data = $this->db->INSERT($tipe_menu, $data_insert);
        $all_lower = str_replace(" ","_",$tipe_menu);
        $first_upercase = ucfirst($all_lower);
        if($data){
            $this->session->set_userdata('notif', 1);
            $this->session->set_userdata('type_notif', 'success');
            $this->session->set_userdata('pesan_notif', "Tambah ".$all_lower." berhasil. ".$first_upercase." ". $data_insert['title']. " berhasil ditambahkan.");
        }else{
            $this->session->set_userdata('error', 1);
            $this->session->set_userdata('type_notif', 'success');
            $this->session->set_userdata('pesan_notif', "Tambah ".$all_lower." gagal. ".$first_upercase." ". $data_insert['title']. " gagal ditambahkan.");
        }
        return $data;    
    }

    // sudah di tes, bekerja dengan baik
    public function inactive_menu_all($id, $tipe_menu){
        $data = array(
            "status" => 'inactive',
        );
        $this->db->where('id =', $id);
        $data = $this->db->UPDATE($tipe_menu, $data);
        return $data;
    }

    public function active_menu_all($id, $tipe_menu){
        $data = array(
            "status" => 'active',
        );
        $this->db->where('id =', $id);
        $data = $this->db->UPDATE($tipe_menu, $data);
        return $data;
    }

    public function hapus_menu_all($id, $urutan, $parent, $tipe_menu){
        $this->db->where('id', $id);
        $data = $this->db->delete($tipe_menu);
        $this->db->set('urutan', 'urutan-1', FALSE);
        $this->db->where('id_parent =', $parent);
        $this->db->where('urutan >=', $urutan);
        $this->db->update($tipe_menu);
        return $data;
    }





    //------------------------------------------------------------------------------------------- Login Admin Proses
    public function check_login($username, $password){
        $this->db->select('*');
        $this->db->from('admin_admin');
        $this->db->where('username', $username);
        $data = $this->db->get()->result_array();
        if ($data){
            if ($password == $data[0]['password']){ // sistem hash belum jadi
                $this->session->set_userdata('notif', 1);
                $this->session->set_userdata('type_notif', 'success');
                $this->session->set_userdata('title_notif', 'Login Berhasil');
                $this->session->set_userdata('image_notif', $data[0]['photo']);
                $this->session->set_userdata('pesan_notif', "Selamat Datang ". $data[0]['nama']);
                return $data;
            }else{
                $this->session->set_userdata('notif', 1);
                $this->session->set_userdata('type_notif', 'error');
                $this->session->set_userdata('title_notif', 'Login Gagal');
                $this->session->set_userdata('pesan_notif', "Email dan Password tidak sesuai. Harap cek kembali");
                return false;
            }
        }
        $this->session->set_userdata('notif', 1);
        $this->session->set_userdata('type_notif', 'error');
        $this->session->set_userdata('title_notif', 'Login Gagal');
        $this->session->set_userdata('pesan_notif', "Email Tidak Ditemukan, Pastikan penulisan benar atau jika belum memiliki akun dapat melakukan pendaftaran");
        return false;
    }
    
    public function lupa_password($kontak){
        $this->db->select('*');
        $this->db->from('admin_admin');
        if (filter_var($kontak, FILTER_VALIDATE_EMAIL)){
            $this->db->where('email', $kontak);
            $data = $this->db->get()->result_array();
            if ($data){
                $this->session->set_flashdata('success', "Silahkan Periksa Email Anda. Jika tidak ditemukan periksa FOLDER SPAM");
                // helper email
                return 1;
            }
        }else{
            $this->db->where('nomor', $kontak);
            $data = $this->db->get()->result_array();
            if ($data){
                    //helper sms
                    $this->session->set_flashdata('success', "SMS Verifikasi Telah Dikirim");
                    return 2;                    
            }            
        }
        $this->session->set_flashdata('error', "Nomor Handphone Tidak Ditemukan, \n Pastikan penulisan benar atau jika belum memiliki akun dapat melakukan pendaftaran");
        return false;
    }

    public function change_password($newpassword){
        $data = array(
            "password" => create_hash($newpassword),
        );
        $this->db->where('email', "saya@ahmadsahro.info");
        return($this->db->UPDATE('admin_user', $data));
    }









    public function notif($type_notif, $title_notif, $pesan_notif){
        $this->session->set_userdata('notif', 1);
        $this->session->set_userdata('type_notif', $type_notif);
        $this->session->set_userdata('title_notif', $title_notif);
        $this->session->set_userdata('pesan_notif',  $pesan_notif);
    }







}
?>
