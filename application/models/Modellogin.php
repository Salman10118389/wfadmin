<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modellogin extends CI_Model{
    
    public function check_data($table, $field, $value){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field, $value);
        $data = $this->db->get()->result_array();
        return $data;
    }




    //-------------------------------------------------------------------------------- Deret User
    //----------------------------------------------------Register
    public function register_user($data){
        $data = $this->db->INSERT('user_calon', $data);
        return $data;
    }

    public function kode_konfirmasi_calon_user($code){

    }

    public function link_konfirmasi_calon_user($code){

    }


    // public function update_calon_user($data, $email){
    //     $this->db->where('email', $email);
    //     return($this->db->UPDATE('m_organization', $data));

    // }
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
