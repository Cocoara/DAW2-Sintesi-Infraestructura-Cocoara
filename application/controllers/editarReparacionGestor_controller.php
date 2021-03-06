<?php defined('BASEPATH') or exit('No direct script access allowed');

class editarReparacionGestor_controller  extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('incidencies_model');
		$this->load->model('mensajes_model');
		$this->load->helper('url_helper');
		$this->load->helper(array('form', 'url'));
		$this->load->library("session");
		$this->load->library("form_validation");
		$this->load->library("ion_auth");
	}
	
	/**
	 * index
	 * Mostrará la vista de edicción de incidencia del Gestor
	 * @return void
	 */
	public function index()
	{

		$user = $this->ion_auth->user()->row();
		$id = $user->id;
		$data['incidencies'] = $this->incidencies_model->get_incidencies_by_id_tecnico($id);
		$data['estados'] = $this->incidencies_model->get_estados_tecnico();
		$data['user'] = $this->ion_auth->user()->row();
		$data['badgeMail'] = $this->mensajes_model->get_cout_of_messages($id);
		$this->load->view('templates/headerInisdeGestor', $data);
		$this->load->view('templates/sidebarInisdeGestor', $data);
		$this->load->view('pages/Gestor_Reparacion', $data);
		$this->load->view('templates/footer');
	}


	
	/**
	 * editar_reparacion
	 * Editará la información de la incidencia en la parte del gestor
	 * @return void
	 */
	public function editar_reparacion()
	{
		$id_incidencia = $this->input->post('id_incidencia');
		$estado = $this->input->post('estado');
		$Fecha_entrada = $this->input->post('fecha_entrada');
		$desc_averia = $this->input->post('desc_averia');
		$uuid = $this->input->post('uuid');
		$Marca = $this->input->post('Marca');
		$Modelo = $this->input->post('Modelo');
		$Numero_serie = $this->input->post('Numero_serie');
		$Diagnostico_prev = $this->input->post('Diagnostico_prev');
		$Telf = $this->input->post('Telf');
		$tiempo_reparcion = $this->input->post('tiempo_reparcion');
		$descripcion_gestor = $this->input->post('descripcion_gestor');


		if ($this->incidencies_model->set_incidencies_by_tecnico($id_incidencia, $estado, $Fecha_entrada, $desc_averia, $uuid, $Marca, $Modelo, $Numero_serie, $Diagnostico_prev, $Telf, $tiempo_reparcion, $descripcion_gestor)) {
			$this->session->set_flashdata('success', "Incidencia actualizada correctamente");
			redirect('');
		} else {
			$this->session->set_flashdata('error', "Hubo un error en la edición de los datos de la incidencia");
			redirect('');
		}
	}
}
