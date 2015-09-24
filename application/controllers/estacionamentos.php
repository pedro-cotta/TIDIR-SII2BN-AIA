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
		if (empty($this->input->post('nome')) OR empty($this->input->post('descricao')) OR empty($this->input->post('coords'))) {
			$this->session->set_flashdata("erro" , "erro");
			redirect ("estacionamentos/cadastroEstacionamento");
		}

		$coords = str_replace("(","",$this->input->post('coords'));
		$coords = str_replace(")","",$coords);
		$lat = explode(",",$coords)[0];
		$lng = explode(",",$coords)[1];

		$dados = array(
			'nome'=>$this->input->post('nome'),
			'descricao'=>$this->input->post('descricao'),
			'endereco'=>$this->input->post('endereco'),
			'latitude' => $lat,
			'longitude' => $lng
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


