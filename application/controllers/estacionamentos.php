<?php 
class estacionamentos extends CI_Controller{

	public function index(){
		$this->load->helper("endereco");
		$this->load->model("estacionamento_model");
		$parks = $this->estacionamento_model->meus();
		$dados = array(
			"parks" => $parks,
			);
		$this->load->view("estacionamentos", $dados);
	}

	public function novoEstacionamento()
	{

	}
}