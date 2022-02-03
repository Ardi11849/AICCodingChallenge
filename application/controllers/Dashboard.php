<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) redirect(base_url(),'refresh');
	}

	public function index()
	{
		$this->load->view('dashboard/start');
	}

	public function enc()
	{
		echo crc32(md5($this->input->post('encrypt')));
	}

	public function saveBonus()
	{
		$data = [];
		for ($i=0; $i < count($this->input->post('pembayaranBuruh')) ; $i++) { 
			$data[$i]['pembayaran'] = $this->input->post('pembayaranBuruh')[$i];
			$data[$i]['nama'] = $this->input->post('namaBuruh')[$i];
			$data[$i]['persen'] = $this->input->post('persenBuruh')[$i];
		}
		$insert = array('JumlahBayar' => $this->input->post('jmlBayar'),
						'Data' => serialize($data),
						'CreatedBy' => $this->session->userdata('id'),
						'CreatedOn' => date('Y-m-d H:i:s')
		);
		echo $this->db->insert('bonus', $insert);
	}

	public function updateBonus()
	{
		$data = [];
		for ($i=0; $i < count($this->input->post('pembayaranBuruh')) ; $i++) { 
			$data[$i]['pembayaran'] = $this->input->post('pembayaranBuruh')[$i];
			$data[$i]['nama'] = $this->input->post('namaBuruh')[$i];
			$data[$i]['persen'] = $this->input->post('persenBuruh')[$i];
		}
		$update = array('JumlahBayar' => $this->input->post('jmlBayar'),
						'Data' => serialize($data),
						'CreatedBy' => $this->session->userdata('id'),
						'CreatedOn' => date('Y-m-d H:i:s')
		);
		$this->db->where('IdBonus', $this->input->post('idBonus'));
		echo $this->db->update('bonus', $update);
	}

	public function getBonus()
	{
		$this->db->select('bonus.IdBonus, bonus.JumlahBayar, bonus.Data, bonus.CreatedOn, users.Username');
		$this->db->from('bonus');
		$this->db->join('users', 'users.IdUser = bonus.CreatedBy', 'left');
		if ($this->session->userdata('role') != 1) $this->db->where('bonus.CreatedBy', $this->session->userdata('id'));
		$this->db->limit($this->input->post('length'), $this->input->post('start'));
		$result = $this->db->get()->result_array();
		$count = $this->db->count_all('bonus');
		$unserialize = [];
		$i = 0;
		$unserialize['draw'] = $this->input->post('draw');
		$unserialize['recordsTotal'] = $count;
		$unserialize['recordsFiltered'] = $count;
		if (count($result) == 0) $unserialize['data'] = [];
		foreach ($result as $key) {
			$data = preg_replace_callback('!s:(\d+):"(.*?)";!', 
            function($match) {
             return ($match[1] == strlen($match[2])) ? $match[0] : 's:' . strlen($match[2]) . ':"' . $match[2] . '";';},
             $key['Data']);
			$unserialize['data'][$i]['IdBonus'] = $key['IdBonus'];
			$unserialize['data'][$i]['JumlahBayar'] = $key['JumlahBayar'];
			$unserialize['data'][$i]['Data'] = unserialize($data);
			$unserialize['data'][$i]['CreatedBy'] = $key['Username'];
			$unserialize['data'][$i]['CreatedOn'] = $key['CreatedOn'];
			$i++;
		}
		echo json_encode($unserialize, true);
	}

	public function detailBonus()
	{
		$this->db->select('bonus.IdBonus, bonus.JumlahBayar, bonus.Data, bonus.CreatedOn, users.Username');
		$this->db->from('bonus');
		$this->db->join('users', 'users.IdUser = bonus.CreatedBy', 'left');
		$this->db->where('bonus.IdBonus', $this->input->post('IdBonus'));
		$result = $this->db->get()->result_array();
		$unserialize = [];
		$i = 0;
		foreach ($result as $key) {
			$unserialize[$i]['IdBonus'] = $key['IdBonus'];
			$unserialize[$i]['JumlahBayar'] = $key['JumlahBayar'];
			$unserialize[$i]['Data'] = unserialize($key['Data']);
			$unserialize[$i]['CreatedBy'] = $key['Username'];
			$unserialize[$i]['CreatedOn'] = $key['CreatedOn'];
			$i++;
		}
		echo json_encode($unserialize, true);
	}

	public function deleteBonus()
	{
		$this->db->where('IdBonus', $this->input->post('idBonus'));
		echo $this->db->delete('bonus');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */