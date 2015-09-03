<?php
class estacionamento_model extends CI_Model
{
	public function meus()
	{
		$this->db->select('*');
		$this->db->from('parks');
		return $this->db->get()->result_array();
	}

	public function novo($dados)
	{
		$this->db->insert('parks', $dados);
	}
}

