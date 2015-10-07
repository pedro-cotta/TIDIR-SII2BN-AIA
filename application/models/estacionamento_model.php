<?php
class estacionamento_model extends CI_Model
{
	public function listarEstacionamentos($id, $rota)
	{
		$this->db->select('*');
		$this->db->from('parks');
		if ($rota == 'batata') {
			$this->db->where('id_dono', $id);
		} else {
			$this->db->where('id', $id);
		}
		$this->db->join('precos', 'precos.id_estacionamento = parks.id');
		return $this->db->get()->result_array();
	}

	public function novo($dados)
	{
		$this->db->insert('parks', $dados);
		return $this->db->insert_id();
	}

	public function npreco($dados, $id_estacionamento)
	{
		if ($id_estacionamento != null) {
			$this->db->insert('precos', $dados);
		} else {
			$this->db->update('precos', $dados);
			$this->db->where('id_estacionamento', $id_estacionamento);
		}
		
		
	}

	public function excluir($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('parks'); 
	}

	public function editar($id, $dados)
	{
		$this->db->update('parks', $dados);
		$this->db->where('id', $id);
	}
}

