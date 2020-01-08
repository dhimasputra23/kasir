<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_penjualan extends CI_Controller {

    function __construct(){
        parent::__construct();
        

        if($this->session->userdata('level') != TRUE){
          redirect(base_url());
        }
    }

    function index(){
        $data['title']="Data History Penjualan";
        $this->load->model('m_penjualan');
        $data['data'] = $this->m_penjualan->get_all_pen();

        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar',$data);
        $this->load->view('history_penjualan/index',$data);
        $this->load->view('template/footer',$data);
    }

    function in_detail($id){
        $data['title']="Detail Penjualan";

        $jual = $this->db->query("select * from tbl_jual where jual_nofak='$id'")->row_array();
        $no_hp = $jual['no_hp'];
        $data['jual'] = $this->db->query("select * from tbl_jual where jual_nofak='$id'")->row_array();
        

        $data['customer'] = $this->db->query("select * from tbl_customer where no_hp='$no_hp'")->row_array();
        $data['dt_jual'] = $this->db->query("select * from tbl_detail_jual where d_jual_nofak='$id' order by d_jual_id desc")->result_array();

        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar',$data);
        $this->load->view('history_penjualan/detail_penjualan',$data);
        $this->load->view('template/footer',$data);
    }

    function cetak_faktur($nofak){
        $this->load->model('m_penjualan');
		$x['data']=$this->m_penjualan->cetak_faktur2($nofak);
		$this->load->view('laporan/v_faktur',$x);
		//$this->session->unset_userdata('nofak');
    }

    function hapus_history_jual()
    {
        $this->load->model('m_penjualan');
        $id=$this->input->post('jual_nofak');
        $this->m_penjualan->hapus_history_penjualan($id);
        $this->session->set_flashdata('msg',"Berhasil");
		redirect('history_penjualan');
        
    }

}