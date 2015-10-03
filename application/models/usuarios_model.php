<?php
class usuarios_model extends CI_Model
{
	public function autentica($login, $senha)
	{
		$this->db->where("login", $login);
		$this->db->where("senha", $senha);
		$usuario =  $this->db->get("usuario")->row_array();
		return $usuario;
	}

}