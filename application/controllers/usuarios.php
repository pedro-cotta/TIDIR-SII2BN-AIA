<?php 
class usuarios extends CI_Controller{

	public function autenticar()
	{
		$this->load->model("usuarios_model");
		$email = $this->input->post("login");
		$senha = $this->input->post("senha");

		$usuario = $this->usuarios_model->autentica($email, $senha);

		if ($usuario) {
			$this->session->set_userdata("usuario_logado" , $usuario);
			$this->session->set_flashdata("success", "Logado com sucesso");
			redirect ("estacionamentos");
		}
		else{
			$this->session->set_flashdata("danger" , "x");
			redirect("");
		}
	}

	public function sair()
	{
		$this->session->unset_userdata("usuario_logado");
		redirect("");
	}
}