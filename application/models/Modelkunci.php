<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelkunci extends CI_Model{
    
    public function buka_kunci($kontak,$password){
        $this->db->select('*');
        $this->db->from('admin_user');

        if (filter_var($kontak, FILTER_VALIDATE_EMAIL)){
            $this->db->where('email', $kontak);
        }else{
            $this->db->where('nomor_telepone', $kontak);
        }

        $data = $this->db->get()->result_array();
        if ($data){
            if ($password == $data[0]['password']){ // sistem hash belum jadi
                    $this->session->set_flashdata('Buka Kunci', "Buka Kunci Sukses, \n Selamat datang ".$data[0]['nama']);
                    return $data;
            }else{
                $this->session->set_flashdata('error', "Password Salah, \n Pastikan penulisan benar atau jika lupa dapat menggunakan buka password");
                return false;
            }
        }
    }

        // $query->result();
        // $query->row_array();
        // $query->num_rows();

        // $this->db->get()->result_array();
        // return($this->db->UPDATE('admin', $newpassword));
        // $this->db->INSERT('proposal', $data_insert));
        
        // $this->db->where('id', $id_date);
        // $this->db->delete('events');
        
        // $this->db->select('*');
        // $this->db->from('events');
        // $this->db->where('id_proposal', $id_proposal);

        // $this->db->where('(id_lokasi_kegiatan = '.$id_location.') AND ((start BETWEEN "' . $start_time . '" AND "' . $end_time . '") OR (end BETWEEN "' . $start_time . '" AND "' . $end_time . '"))');
        // $this->db->limit(1);
        // $this->db->get();
        
        // $query=$this->db->get();
        // $query->result();
}
?>
