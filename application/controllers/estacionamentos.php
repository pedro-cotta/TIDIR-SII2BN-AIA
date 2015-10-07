<?php 
class estacionamentos extends CI_Controller{

	public function index()
	{
		$this->output->enable_profiler(FALSE);
		$id = $this->session->userdata("usuario_logado")['id_usuario'];
		$this->load->model("estacionamento_model");
		$parks = $this->estacionamento_model->listarEstacionamentos($id,'batata');
		$dados = array(
			"parks" => $parks,
			);
		$this->load->view("estacionamentos", $dados);	
	}

	public function novoEstacionamento()
	{
		$this->output->enable_profiler(FALSE);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('cep', 'CEP', 'required');
		$this->form_validation->set_rules('uf', 'UF', 'required');
		$this->form_validation->set_rules('cidade', 'Cidade', 'required');
		$this->form_validation->set_rules('bairro', 'Bairro', 'required');
		$this->form_validation->set_rules('rua', 'Rua', 'required');
		$this->form_validation->set_rules('numero', 'Nº', 'required');
		$this->form_validation->set_rules('descricao', 'Descrição', 'required');

		$this->form_validation->set_message('required', '<span class="glyphicon glyphicon-exclamation-sign"></span> Este campo é obrigatorio.');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('cadastroEstacionamento');
		}
		else
		{

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

				$this->estacionamento_model->npreco($precos, null);

				if ($parks) 
				{
					$this->session->set_flashdata("sucesso" , "sucesso");
					redirect ("estacionamentos/novoEstacionamento");
				} 
				elseif (!$parks) 
				{
					$this->session->set_flashdata("erro" , "erro");
					redirect ("estacionamentos/novoEstacionamento");
				}
			}
		}

		public function editarEstacionamento()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nome', 'Nome', 'required');
			$this->form_validation->set_rules('cep', 'CEP', 'trim');
			$this->form_validation->set_rules('uf', 'UF', 'required');
			$this->form_validation->set_rules('cidade', 'Cidade', 'trim|required');
			$this->form_validation->set_rules('bairro', 'Bairro', 'required');
			$this->form_validation->set_rules('rua', 'Rua', 'required');
			$this->form_validation->set_rules('numero', 'Nº', 'required');
			$this->form_validation->set_rules('descricao', 'Descrição', 'required');

			$this->form_validation->set_message('required', '<span class="glyphicon glyphicon-exclamation-sign"></span> Este campo é obrigatorio.');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			$id = $this->input->get("id");
			$this->load->model("estacionamento_model");
			$park = $this->estacionamento_model->listarEstacionamentos($id,'peroca');

			$park[0]["uf"] = explode(",",$park[0]["endereco"])[0];
			$park[0]["cidade"] = explode(",",$park[0]["endereco"])[1];
			$park[0]["bairro"] = explode(",",$park[0]["endereco"])[2];
			$park[0]["rua"] = explode(",",$park[0]["endereco"])[3];
			$park[0]["numero"] = explode(",",$park[0]["endereco"])[4];
			$dados["park"] = $park;

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('editarEstacionamento', $dados);
			}
			else
			{
				$coords = str_replace("(","",$this->input->post('coords'));
					$coords = str_replace(")","",$coords);
					$lat = explode(",",$coords)[0];
					$lng = explode(",",$coords)[1];

					$edit = array(
						'nome'=>$this->input->post('nome'),
						'descricao'=>$this->input->post('descricao'),
						'endereco'=>$this->input->post('endereco'),
						'latitude'=>$lat,
						'longitude'=>$lng,
						'id_dono'=>$this->session->userdata("usuario_logado")['id_usuario']
						);

					$precos = array(
						'id_estacionamento'=>$id,
						'15min'=> str_replace(",",".",$this->input->post('15min')),
						'30min'=>str_replace(",",".",$this->input->post('30min')),
						'phora'=>str_replace(",",".",$this->input->post('hora')),
						'Hsub'=>str_replace(",",".",$this->input->post('sHora')),
						'diaria'=>str_replace(",",".",$this->input->post('diaria')),
						'pernoite'=>str_replace(",",".",$this->input->post('pernoite'))
						);

					$this->load->model("estacionamento_model");

					$park = $this->estacionamento_model->editar($id,$edit);
					$this->estacionamento_model->npreco($precos, $id);

					$this->load->view('editarEstacionamento', $dados);
				}
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


