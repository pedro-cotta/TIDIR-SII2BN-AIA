<?php 
class mapa extends CI_Controller{

	public function index(){
		$this->load->view("mapa");
	}

	public function pegaPontos()
	{
		$this->load->model("mapa_model");
		$pontos = $this->mapa_model->pontos();
		$dadosJson = json_encode($pontos);
		//$ponteiro = fopen ('pontos.json', 'w+');
		//fwrite($ponteiro, $dadosJson);
		//fclose($ponteiro);
		echo json_encode($pontos);
		//print_r($pontos);
	}
}