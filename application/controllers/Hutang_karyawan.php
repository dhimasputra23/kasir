<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hutang_karyawan extends CI_Controller {

	function __construct(){
		parent::__construct();
    $this->load->model('M_hutang_karyawan');  
    
	}

	function index(){
        $data['title']="Data Hutang Karyawan";

        $data['data'] = $this->M_hutang_karyawan->tampilData();
 
        $this->load->model('M_karyawan');
        $data['karyawan'] = $this->M_karyawan->tampil_karyawan();
        $data['status'] = ['BelumLunas','Lunas'];

        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('template/topbar',$data);
        $this->load->view('hutang_karyawan/index',$data);
        $this->load->view('template/footer',$data);
  }
  
  function tambah_data(){
        $this->M_hutang_karyawan->tambahData();
        $this->session->set_flashdata('msg','Data berhasil ditambahkan');
        redirect('hutang_karyawan');
  }

  function edit_data(){
    $this->M_hutang_karyawan->editData();
    $this->session->set_flashdata('msg','Data berhasil diubah');
    redirect('hutang_karyawan');
  }

  function hapus_data(){
    $id=$this->input->post('id');
    $this->M_hutang_karyawan->hapusData($id);
    $this->session->set_flashdata('msg','Data berhasil dihapus');
    redirect('hutang_karyawan');
  }


}

