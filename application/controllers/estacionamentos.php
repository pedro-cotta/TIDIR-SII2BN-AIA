<?php 
class estacionamentos extends CI_Controller{

	public function index()
	{
		$this->output->enable_profiler(FALSE);
		$this->load->model("estacionamento_model");
		$parks = $this->estacionamento_model->listarEstacionamentos('batata');

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
				'latitude'=>$lat,
				'longitude'=>$lng,
				'id_dono'=>$this->session->userdata("usuario_logado")['id_usuario']
				);

			$this->load->model("estacionamento_model");
			$parks = $this->estacionamento_model->novo($dados);

			$precos = array(
				'id_estacionamento'=>$parks,
				'15min'=> str_replace(",",".",$this->input->post('15min')),
				'30min'=>str_replace(",",".",$this->input->post('30min')),
				'phora'=>str_replace(",",".",$this->input->post('hora')),
				'Hsub'=>str_replace(",",".",$this->input->post('sHora')),
				'diaria'=>str_replace(",",".",$this->input->post('diaria')),
				'pernoite'=>str_replace(",",".",$this->input->post('pernoite'))
				);

			$this->estacionamento_model->npreco($precos);

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

		public function editarEstacionamento()
		{
			$this->output->enable_profiler(FALSE);
			$id = $this->input->get("id");
			$this->load->model("estacionamento_model");
			$park = $this->estacionamento_model->listarEstacionamentos($id);
			$dados = array(
				'park'=>$park
				);
			$this->load->view('editarEstacionamento', $dados);
		}

		public function excluirEstacionamento()
		{
			$id = $this->input->get("id");
			$this->load->model("estacionamento_model");
			$result = $this->estacionamento_model->excluir($id);
			if ($result) 
			{
				$this->session->set_flashdata("sucesso" , "sucesso");
				redirect ("estacionamentos");
			} 
			elseif (!$result) 
			{
				$this->session->set_flashdata("erro" , "erro");
				redirect ("estacionamentos");
			}
		}
	}


