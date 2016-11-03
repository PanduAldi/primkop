<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_webadmin extends CI_Model {


	public function get_all($table, $limit, $offset)
	{
		return $this->db->get($table, $limit, $offset);
	}

	public function get_by_subdomain($table, $subdomain)
	{
		$this->db->where('subdomain', $subdomain);
		return $this->db->get($table);
	}

	public function get_id($table, $pk, $id)
	{
		$this->db->where($pk, $id);
		return $this->db->get($table);
	}

	public function count($table)
	{
		return $this->db->count_all($table);
	}

	public function insertData($table, $record)
	{

		$this->db->insert($table, $record);
	}

	public function updateData($table, $record, $pk, $id)
	{
		$this->db->where($pk, $id);
		$this->db->update($table, $record);
	}

	public function deleteData($table, $pk, $id)
	{
		$this->db->where($pk, $id);
		$this->db->delete($table);
	}

	public function auth($table, $username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password); 
		return $this->db->get($table);
	}

	public function cekPassword($table, $username)
	{
		$this->db->where('username', $username);
		$this->db->get($table);
	}

	public function get_comment($table, $id_comment, $subdomain)
	{
		$this->db->select('tb_comment.id, tb_artikel.judul, tb_comment.nama, tb_comment.email, tb_comment.comment, tb_comment.date, tb_comment.ip_address');
		$this->db->from($table);
		$this->db->join('tb_artikel', 'tb_artikel.id_artikel = tb_comment.id_artikel');
		$this->db->where('id_comment', $id_comment);
		$this->db->where('tb_comment.subdomain', $subdomain);
		return $this->db->get();
	}

}

/* End of file m_webadmin.php */
/* Location: ./application/models/m_webadmin.php */