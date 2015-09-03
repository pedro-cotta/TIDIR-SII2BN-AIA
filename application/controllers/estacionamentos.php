<?php 
class estacionamentos extends CI_Controller{

	public function index()
	{
		$this->output->enable_profiler(FALSE);
		$this->load->model("estacionamento_model");
		$parks = $this->estacionamento_model->meus();

		$dados = array(
			"parks" => $parks,
			);
		$this->load->view("estacionamentos", $dados);	
	}

	public function cadastroEstacionamento()
	{
		$this->load->view("cadastroEstacionamento");
	}

	public function novoEstacionamento()
	{
		$this->output->enable_profiler(FALSE);
		$dados = array(
			'nome'=>$this->input->post('nome'),
			'descricao'=>$this->input->post('descricao'),
			'latitude' => $this->input->post('latitude'),
			'longitude' => $this->input->post('longitude')
			);
		$this->load->model("estacionamento_model");
		$parks = $this->estacionamento_model->novo($dados);

		if ($parks) 
		{
			$this->session->set_flashdata("sucesso" , "sucesso");
			redirect ("estacionamentos/cadastroEstacionamento");
		} 
		elseif (!$parks) 
		{
			$this->session->set_flashdata("erro" , "erro");
			redirect ("estacionamentos/cadastroEstacionamento");
		}	
	}
}


