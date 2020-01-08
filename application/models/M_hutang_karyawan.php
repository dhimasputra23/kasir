<?php
class M_hutang_karyawan extends CI_Model{
    
    function tampilData(){
        return $this->db->query("select a.id, a.nominal, a.jumlah_bayar,a.tanggal, a.keterangan, a.status, b.nama as nama_karyawan
                                    from hutang_karyawan a left join karyawan b on a.id_karyawan=b.id order by a.status='Lunas' ")->result_array();
    }

    function tambahData(){
        $nominal = $this->input->post('nominal',TRUE);
        $data = [
            "id_karyawan" => $this->input->post('karyawan',TRUE),
            "nominal" => $this->input->post('nominal',TRUE),
            "jumlah_bayar" => 0,
            "keterangan" => $this->input->post('keterangan',TRUE),
            "status" => 'BelumLunas',
            "tanggal" => $this->input->post('tanggal',TRUE),
        ];
        $this->db->insert('hutang_karyawan',$data);
        $this->db->query("update saldo set saldo=saldo-'$nominal' where id=1");
    }

    function editData(){
        $id = $this->input->post('id',TRUE);
        $nominal = $this->input->post('nominal');
        $uang = 0;
        $jumlh_bayar = $this->input->post('jumlah_bayar');

        $tampung = $this->db->query("SELECT * FROM hutang_karyawan WHERE id ='$id'")->row_array();

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
            "id_karyawan" => $this->input->post('karyawan'),
            "nominal" => $this->input->post('nominal'),
            "jumlah_bayar" => $this->input->post('jumlah_bayar'),
            "keterangan" => $this->input->post('keterangan'),
            "status" => $this->input->post('status')
        ];

        $this->db->where('id', $this->input->post('id',TRUE));
        $this->db->update('hutang_karyawan',$data);

        if($tampung['jumlah_bayar'] == 0){
            $this->db->query("update saldo set saldo=saldo+'$jumlh_bayar' where id=1");
        }
        else{
            if($jumlh_bayar == $tampung['nominal']){
                $uang = $jumlh_bayar-$tampung['jumlah_bayar'];
                $this->db->query("update saldo set saldo=saldo+'$uang' where id=1");
            }
            else{
                $uang = $jumlh_bayar-$tampung['jumlah_bayar'];
                $this->db->query("update saldo set saldo=saldo+'$uang' where id=1");
            }
        }
    }

    function hapusData($id){
        $tampung = $this->db->query("SELECT * FROM hutang_karyawan WHERE id ='$id'")->row_array();
        $uang = $tampung['nominal'];

        $this->db->delete('hutang_karyawan',['id' => $id]);
        
    }

}