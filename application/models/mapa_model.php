<?php
class mapa_model extends CI_Model
{
	public function pontos(){
		$this->db->select('*');
		$this->db->from('parks');
		return $this->db->get()->result_array();
	}
}