<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nosotros extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();

		$this->load->model('noticies_model');
		$this->load->helper('url_helper');
		$this->load->library("session");
	}

	public function index()
	{
		
		if ($this->session->userdata('user')) {
			$this->load->view('templates/header');
			$this->load->view('pages/nosotros');
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header');
			$this->load->view('pages/nosotros');
			$this->load->view('templates/footer');
		}
	}

}
