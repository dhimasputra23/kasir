<?php
class M_pengeluaran extends CI_Model{

    function tampilData(){
        return $this->db->query("select a.id, a.jenis_pengeluaran, a.nominal, a.tanggal, a.keterangan, b.nama as nama_karyawan
                                        from pengeluaran a left join karyawan b on a.penerima=b.id order by a.id desc")->result_array();
    }

    function tambahData(){
        $uang = $this->input->post('nominal',TRUE);

        $data = [
            "jenis_pengeluaran" => $this->input->post('jns_pengeluaran',TRUE),
            "nominal" => $this->input->post('nominal',TRUE),
            "tanggal" => $this->input->post('tanggal',TRUE),
            "keterangan" => $this->input->post('keterangan',TRUE),
            "penerima" => $this->input->post('penerima',TRUE),
        ];

        $this->db->insert('pengeluaran',$data);
        $this->db->query("update saldo set saldo=saldo-'$uang' where id=1");
    }

    function editData(){
	  $id = $this->input->post('id',TRUE);
        $nominal = $this->input->post('nominal');
        $uang = 0;
       

        $tampung = $this->db->query("SELECT * FROM pengeluaran WHERE id ='$id'")->row_array();

        $tampung2 = $this->db->query("select saldo from saldo limit 1")->row_array();

        if($tampung['nominal'] == $nominal){
            $uang = 0;
        }
        else if($tampung['nominal'] > $nominal){
            $t3 = $nominal - $tampung['nominal'];
            $total = $tampung2['saldo'] - $t3;

            $data_saldo = [
                'saldo' => $total
            ]; 
    
            $this->db->where('id', 1);
            $this->db->update('saldo',$data_saldo);
        }
        else if($tampung['nominal'] < $nominal){
            $t3 = $tampung['nominal'] - $nominal ;
            $total = $tampung2['saldo'] + $t3;

            $data_saldo = [
                'saldo' => $total
            ]; 
    
            $this->db->where('id', 1);
            $this->db->update('saldo',$data_saldo);
        }
		
        $data = [
            "jenis_pengeluaran" => $this->input->post('jns_pengeluaran',TRUE),
            "nominal" => $this->input->post('nominal',TRUE),
            "tanggal" => $this->input->post('tanggal',TRUE),
            "keterangan" => $this->input->post('keterangan',TRUE),
            "penerima" => $this->input->post('penerima',TRUE),
        ];

        $this->db->where('id',$this->input->post('id',TRUE));
        $this->db->update('pengeluaran',$data);
    }

    function hapusData($id){
        $this->db->delete('pengeluaran',['id' => $id]);
    }

}