<?php defined('BASEPATH') or exit('no access allowed');
class M_heroUnit extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getHero()
	{
		$this->db->select("*");
		$this->db->from('hero');
		$this->db->where('status', '1');
		$get = $this->db->get();
		return $get->result_array();
	}

	public function getAllHero()
	{
		$this->db->select("*");
		$this->db->from('hero');
		$get = $this->db->get();
		return $get->result_array();
	}

	public function acc($data)
	{
		$this->db->select("*");
		$this->db->from('hero');
		$this->db->where('id', $data['id']);
		$this->db->update('hero', $data);
	}

	public function hapus($data)
	{
		$this->db->select("*");
		$this->db->from('hero');
		$this->db->where('id', $data['id']);
		$this->db->delete('hero', $data);
	}
}
