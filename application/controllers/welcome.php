<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->view('welcome_message');
		
	}
	function signup() {
		$this->load->database();
		$data = array('name'=> $this->input->post('name'), 'email'=> $this->input->post('email'), 'password'=> $this->input->post('password') );
		$this->db->insert('users',$data);
		echo "login successfully";
	}
	function login() {
		$this->load->database();
		$query = $this->db->query("SELECT * FROM users WHERE email ="."'".$this->input->post('email')."'"." AND password="."'".$this->input->post('password')."'".";");
		$data = $query->result();
		if(!empty($data)){
			echo json_encode($data);
		} else {
			echo "invalid id or password";
		}
		
	}
	function userUpdate() {
		$this->load->database();
		$data = array('name'=> $this->input->post('name'), 'email'=> $this->input->post('email'), 'password'=> $this->input->post('password'));
	
		$this->db->where('email',$this->input->post('email'));
		$data = $this->db->update('users', $data);
		echo json_encode($data);
	}
	function adminUpdate() {
		
	}
	function adminDelete() {
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */