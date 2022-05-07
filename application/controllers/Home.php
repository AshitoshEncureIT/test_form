<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){

		parent::__construct();

		$this->data['title'] = 'Json Form test';

	}

	public function index()
	{
 
		// $this->load->view('home_view');
		$this->data['title'] = 'Json Form test - Upload file';
		$this->data['page'] = 'home_view';
		$this->data['active_li'] = 'upload_file';

		$this->load->vars($this->data);
        $this->load->view('template');
	}

	public function json_file()
	{
		$this->data['title'] = 'Json Form test - Dynamic Form';

		$json_file = $_FILES['json_file'];
		// pr($json_file);
		// die;
		$form_data = json_decode(file_get_contents($json_file['tmp_name']));
		$form_data = $form_data->fields;
		// pr($form_data);
		foreach ($form_data as $key => $data) {
		    if(!isset($data->isRequired)){
			    $form_data[$key]->isRequired = '';
			}

			if(!isset($data->isReadonly)){
			    $form_data[$key]->isReadonly = '';
			}

			if(!isset($data->unit)){
			    $form_data[$key]->unit = '';
			}
		}
		// pr($form_data);die;
		$this->data['form_data'] = $form_data;

		$this->data['page'] = 'dynamic_form_view';
		$this->data['active_li'] = 'dynamic_form';

		$this->load->vars($this->data);
        $this->load->view('template');
	}

	public function submit_form()
	{
		$this->session->set_flashdata('message', 'Form has been submitted successfully.');
		redirect('home');
	}
}