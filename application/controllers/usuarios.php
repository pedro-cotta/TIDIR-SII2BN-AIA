<?php 
class estacionamentos extends CI_Controller{

	public function autenticar()
	{
		$this->load->model("usuarios_model");
		$email = $this->input->post("login");
		$senha = $this->input->post("senha");

		$usuario=$this->usuarios_model->buscaEmailSenha($email, $senha);

		if ($usuario) {
			echo "OK OK";
			/*$this->session->set_userdata("usuario_logado" , $usuario);
			$this->session->set_flashdata("success", "Logado com sucesso");
			redirect ("estacionamentos");*/
		}
		else{
			echo "mal mal";
			/*$this->session->set_flashdata("danger" , "x");
			redirect("estacionamentos");*/
		}
	}

}