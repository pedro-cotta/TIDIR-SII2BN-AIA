<?php
class mapa_model extends CI_Model
{
	public function pontos(){
		$this->db->select('*');
		$this->db->from('parks');
		$this->db->join('precos', 'precos.id_estacionamento = parks.id');
		$this->db->join('usuario', 'usuario.id_usuario = parks.id_dono');
		return $this->db->get()->result_array();
	}
}