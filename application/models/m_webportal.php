<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_webportal extends CI_Model {

	public function get_all($table, $subdomain, $limit, $offset)
	{
		$this->db->where('subdomain', $subdomain);
		return $this->db->get($table, $limit, $offset);
	}

	public function get_semua($table)
	{
		return $this->db->get($table);
	}

	public function get_desc($table, $desc, $subdomain, $limit, $offset)
	{
		$this->db->where('subdomain', $subdomain);
		$this->db->order_by($desc, 'desc');
		return $this->db->get($table, $limit, $offset);
	}

	public function get_not_in($table, $id_artikel, $random, $subdomain, $limit, $offset)
	{
		$this->db->where('subdomain', $subdomain);
		$this->db->where_not_in('id_artikel', $id_artikel);
		$this->db->order_by($random, 'random');
		return $this->db->get($table, $limit, $offset);
	}

	public function get_not_in_all($table, $pk, $id, $subdomain, $limit, $offset)
	{
		$this->db->where('subdomain', $subdomain);
		$this->db->where_not_in($pk, $id);
		return $this->db->get($table, $limit, $offset);
	}

	public function get_not_in_headline($table, $pk, $id, $subdomain, $limit, $offset)
	{
		$this->db->where('subdomain', $subdomain);
		$this->db->where('publish', 'y');
		$this->db->where_not_in($pk, $id);
		return $this->db->get($table, $limit, $offset);
	}

	public function get_not_in_event($table, $id, $random, $subdomain, $limit, $offset)
	{
		$this->db->where('subdomain', $subdomain);
		$this->db->where_not_in('id', $id);
		$this->db->order_by($random, 'random');
		return $this->db->get($table, $limit, $offset);
	}

	public function get_not_in_kontak($table, $id, $subdomain, $limit, $offset)
	{
		$array = array($id);
		$this->db->where('subdomain', $subdomain);
		$this->db->where_not_in('nama', $array);
		return $this->db->get($table, $limit, $offset);
	}

	public function get_publish($table, $desc, $subdomain, $limit, $offset)
	{
		$this->db->where('subdomain', $subdomain);
		$this->db->where('publish', 'y');
		$this->db->order_by($desc, 'desc');
		return $this->db->get($table, $limit, $offset);
	}

	public function get_id($table, $pk, $id)
	{
		$this->db->where($pk, $id);
		return $this->db->get($table);
	}

	public function get_id_subdomain($table, $subdomain, $pk, $id)
	{
		$this->db->where($pk, $id);
		$this->db->where('subdomain', $subdomain);
		$this->db->from($table);
		return $this->db->get();
	}

	public function get_by_subdomain($table, $subdomain)
	{
		$this->db->where('subdomain', $subdomain);
		return $this->db->get($table);
	}

	public function get_headline($table, $desc, $subdomain, $limit, $offset)
	{
		$this->db->where('headline', 'y');
		$this->db->where('subdomain', $subdomain);
		$this->db->order_by($desc, 'desc');
		return $this->db->get($table, $limit, $offset);
	}

	public function get_slide($table, $subdomain, $desc, $limit, $offset)
	{
		$this->db->where('subdomain', $subdomain);
		$this->db->order_by($desc, 'desc');
		return $this->db->get($table, $limit, $offset); 		
	}

	public function count($table)
	{
		return $this->db->query("SELECT COUNT(*) FROM $table GROUP BY subdomain");
	}

	public function get_comment($id_artikel)
	{
		$this->db->where('id_artikel', $id_artikel);
		$this->db->where('id_comment', 0);

		return $this->db->get('tb_comment');
	}

	public function insert_comment($record)
	{
		$this->db->insert('tb_comment', $record);
	}

	//visitor model
	public function hari_ini($tanggal)
	{
		$this->db->like('tanggal', $tanggal);
		$this->db->from('visitor');
		return $this->db->count_all_results();
	}

	public function bulan_ini()
	{
		$this->db->like('tanggal', date('Y-m'), 'after');
		$this->db->from('visitor');
		return $this->db->count_all_results();
	}

	public function hit_counter($tanggal)
	{
		$this->db->select('SUM(counter) AS hit_counter');
		$this->db->from('visitor');
		$this->db->where('tanggal', $tanggal);
		return $this->db->get();
	}

	public function total_hit()
	{
		$this->db->select('SUM(counter) AS total_hit');
		$this->db->from('visitor');
		return $this->db->get();
	}

	public function online()
	{
		$batas_waktu = time() - 300;
		$this->db->where('online >', $batas_waktu);
		return $this->db->get('visitor')->num_rows();
	}

}

/* End of file m_webportal.php */
/* Location: ./application/models/m_webportal.php */