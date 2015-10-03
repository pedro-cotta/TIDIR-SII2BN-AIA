<?php
class estacionamento_model extends CI_Model
{
	public function listarEstacionamentos($id)
	{
		$this->db->select('*');
		$this->db->from('parks');
		if ($id != 'batata') {
			$this->db->where('id', $id);
		} else {
			$this->db->where('id_dono', $this->session->userdata("usuario_logado")['id_usuario']);
		}
		$this->db->join('precos', 'precos.id_estacionamento = parks.id');
		return $this->db->get()->result_array();
	}

	public function novo($dados)
	{
		$this->db->insert('parks', $dados);
		return $this->db->insert_id();
	}

	public function npreco($dados)
	{
		return $this->db->insert('precos', $dados);
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

