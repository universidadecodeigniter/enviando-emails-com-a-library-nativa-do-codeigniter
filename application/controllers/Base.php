<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function Index()
	{
		$this->load->view('home');
	}

	public function EnviarEmail()
	{
		$this->load->library('email');
		$dados = $this->input->post();

		$config['protocol'] = 'mail';
		$config['wordwrap'] = TRUE;
		$config['validate'] = TRUE;

		if(isset($dados['template']))
			$config['mailtype'] = 'html';
		else
			$config['mailtype'] = 'text';

		$this->email->initialize($config);

		$this->email->from('contato@universidadecodeigniter.com.br', 'Universidade CodeIgniter');
		$this->email->to($dados['email'],$dados['nome']);

		$this->email->subject('Enviando emails com a library nativa do CodeIgniter');

		if(isset($dados['template']))
			$this->email->message($this->load->view('email-template',$dados, TRUE));
		else
			$this->email->message($dados['mensagem']);

		if(isset($dados['anexo']))
			$this->email->attach('./assets/images/unici/logo.png');

		if($this->email->send())
		{
			$this->session->set_flashdata('success','Email enviado com sucesso!');
			$this->load->view('home');
		}
		else
		{
			$this->session->set_flashdata('error',$this->email->print_debugger());
			$this->load->view('home');
		}
	}
}
