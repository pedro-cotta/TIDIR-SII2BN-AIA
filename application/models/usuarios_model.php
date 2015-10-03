<?php
class usuarios_model extends CI_Model

class estacionamento_model extends CI_Model
{
	public function autentica($login, $senha)
	{
		$this->db->where("login", $login);
		$this->db->where("senha", $senha);
		$usuario =  $this->db->get("usuario")->row_array();
		$usuario =  $this->db->get("usuarios")->row_array();
		return $usuario;
	}
}