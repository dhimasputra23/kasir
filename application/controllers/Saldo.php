<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saldo extends CI_Controller{

    function __construct(){
        parent::__construct();
		
        if($this->session->userdata('level') != TRUE){
          redirect(base_url());
        }
    }

    function index(){
        $data['title']="Profile";

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['data'] = $this->db->query("select * from saldo")->row_array();
        
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar',$data);
        $this->load->view('saldo/index',$data);
        $this->load->view('template/footer',$data);
    }

    public function editSaldo()
	{
		$data=array(
            "saldo" => $_POST['saldo'],
		);

		$this->db->where('id',$_POST['id']);
		$this->db->update('saldo',$data);
		$this->session->set_flashdata('msg',"Berhasil diubah");
		redirect('saldo');
	}
}