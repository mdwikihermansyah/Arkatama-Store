<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mcari extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Fetch records
    public function getData($search = "")
    {

        $this->db->select('*');
        $this->db->from('product');

        if ($search != '') {
            $this->db->like('nama', $search);
            $this->db->or_like('kategori', $search);
            $this->db->or_like('deskripsi', $search);
            $this->db->or_like('harga', $search);
        }

        $query = $this->db->get();

        return $query->result_array();
    }
}
