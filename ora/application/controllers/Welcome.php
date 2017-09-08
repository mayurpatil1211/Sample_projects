<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$this->load->helper('url');
				//echo base_url();
		$this->load->view('mainPage');
	}

	public function newData(){
		$this->load->helper('url');
		$this->load->view('insertData');
	}

	public function frontPage(){
		$this->load->helper('url');
		$this->load->view('mainPage');
	}


	public function insertData(){
		//echo "hello";
		$this->load->helper('url');

		$data = array
		(	
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'contact' => $this->input->post('contact'),
		
		);
		// print_r($data);
		$this->load->model('Jobs'); 
		$this->Jobs->insertData($data);
    	
       	redirect('/Welcome/getdata');
       	// $this->getData();
       
         
       

	
	}

	public function getdata(){
		$this->load->helper('url');
		$query = $this->db->get('test');
		$data = $query->result();
		//$res  = json_decode($data);
		// print_r($res);
		$this->load->view('list.php', array('data'=>$data));
		// $this->insertData();
		
	}

		public function delete(){

		$this->load->helper('url');
		$this->load->model('Jobs');
		 $id = $this->uri->segment(3);
		$res = $this->Jobs->deleteData($id);
		 redirect('/Welcome/getdata');
	}

}
