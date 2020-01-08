<?php
class Laporan extends CI_Controller{
    function __construct()
    {
		parent::__construct();
		
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_suplier');
		$this->load->model('m_pembelian');
		$this->load->model('m_penjualan');
		$this->load->model('m_laporan');
		$this->load->model('m_karyawan');
	}

	function index(){
    
        $data['title'] = 'Laporan';
		$data['data']=$this->m_barang->tampil_barang();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['karyawan'] = $this->m_karyawan->tampil_karyawan();

        $this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('template/topbar',$data);
        $this->load->view('laporan/index',$data);
        $this->load->view('template/footer',$data);
	
    }
    
	function lap_stok_barang(){
		$x['data']=$this->m_laporan->get_stok_barang();
		$this->load->view('laporan/v_lap_stok_barang',$x);
	}

	function lap_data_barang(){
		$x['data']=$this->m_laporan->get_data_barang();
		$this->load->view('laporan/v_lap_barang',$x);
	}

	function exportExcel(){
		// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excel
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data_Barang.xls");

		$data['data'] = $this->m_laporan->get_data_barang()->result_array();

		$this->load->view('laporan/export_excel', $data);
	}

	function lap_data_penjualan(){
		$x['data']=$this->m_laporan->get_data_penjualan();
		$x['jml']=$this->m_laporan->get_total_penjualan();
		$this->load->view('laporan/v_lap_penjualan',$x);
	}

	function lap_penjualan_periode(){
		$tanggal1=$this->input->post_get('tgl1');
		$tanggal2=$this->input->post_get('tgl2');

		$x['tanggal1'] = $this->input->post_get('tgl1');
		$x['tanggal2'] = $this->input->post_get('tgl2');

		$x['jml']=$this->m_laporan->get_data__total_jual_periode($tanggal1,$tanggal2);
		$x['data']=$this->m_laporan->get_data_jual_periode($tanggal1,$tanggal2);
		$this->load->view('laporan/v_lap_jual_periode',$x);
	}

	function lap_penjualan_barang(){

		$barang = $this->input->post_get('barang',TRUE);
		$x['barang'] = $this->input->post_get('barang',TRUE);

		$x['data']=$this->m_laporan->get_data_jual_barang($barang);
		$this->load->view('laporan/v_lap_jual_barang',$x);
	}

	function lap_penjualan_kat_barang(){
		$kat_barang = $this->input->post_get('kat_barang',TRUE);
		$x['kat_barang'] = $this->input->post_get('kat_barang',TRUE);

		$x['data']=$this->m_laporan->get_data_jual_kat_barang($kat_barang);
		$this->load->view('laporan/v_lap_jual_kat_barang',$x);
	}

	function lap_laba_rugi(){
		$tanggal1=$this->input->post_get('tgl1');
		$tanggal2=$this->input->post_get('tgl2');

		$x['tanggal1'] = $this->input->post_get('tgl1');
		$x['tanggal2'] = $this->input->post_get('tgl2');

		$x['jml']=$this->m_laporan->get_total_lap_laba_rugi($tanggal1,$tanggal2);
		$x['data']=$this->m_laporan->get_lap_laba_rugi($tanggal1,$tanggal2);
		$this->load->view('laporan/v_lap_laba_rugi',$x);
	}

	function lap_hutang_karyawan(){

		$x['data']=$this->m_laporan->get_lap_hutang_karyawan();
		$this->load->view('laporan/v_lap_hutang_karyawan',$x);
	}

	function lap_pengeluaran_toko(){
		$tanggal1=$this->input->post_get('tgl1');
		$tanggal2=$this->input->post_get('tgl2');

		$x['tanggal1'] = $this->input->post_get('tgl1');
		$x['tanggal2'] = $this->input->post_get('tgl2');

		$x['data']=$this->m_laporan->get_laporan_pengeluaran($tanggal1,$tanggal2);
		$this->load->view('laporan/v_lap_pengeluaran_toko',$x);
	}

}