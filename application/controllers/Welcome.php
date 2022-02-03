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
		$this->load->view('welcome_message');
	}

	public function login()
	{
		$result = $this->db->query('SELECT u.IdUser, u.Username, u.Password, u.Role FROM users as u WHERE u.Username = "'.$this->input->post('namaUser').'" AND u.Password = '.crc32(md5($this->input->post('password'))))->result_array();
		if (count($result) == 1) {
			foreach ($result as $key) {
				$this->session->set_userdata('id', $key['IdUser']);
				$this->session->set_userdata('username', $key['Username']);
				$this->session->set_userdata('role', $key['Role']);
			}
			echo '1';
		}else{
			echo '0';
		}
	}

	public function logout()
	{
		session_destroy();
		redirect(base_url(),'refresh');
	}
}
