<?php
class estacionamento_model extends CI_Model
{
	public function autentica($login, $senha)
	{
		$this->db->where("login", $login);
		$this->db->where("senha", $senha);
		$usuario =  $this->db->get("usuarios")->row_array();
		return $usuario;
	}

}