<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian_model extends CI_Model {

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($kd_kembali, $data, $table)
    {
        $this->db->where('kd_kembali', $kd_kembali);
        $this->db->update($table, $data);
    }
	
	public function delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

}
