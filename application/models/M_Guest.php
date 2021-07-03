<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Guest extends CI_Model {
    public function getDataKota(){        
        return $this->db->get('terminal');
    }
    public function cari_tiket($data){
        $this->db->select('jadwal.*, Asal.kota as ASAL, Tujuan.kota as TUJUAN');
        $this->db->where($data);
        $this->db->like('tgl_berangkat', $this->input->post('tanggal'));
        $this->db->from('jadwal');
        $this->db->join('terminal as Asal','jadwal.asal = Asal.id','left');
        $this->db->join('terminal as Tujuan','jadwal.tujuan = Tujuan.id','left');
        return $this->db->get();
    }
    public function getDataInfoPesan($id){  
        $this->db->select('jadwal.*, Asal.kota as ASAL, Tujuan.kota as TUJUAN');      
        $this->db->where('jadwal.id',$id);
        $this->db->join('terminal as Asal','jadwal.asal = Asal.id','left');
        $this->db->join('terminal as Tujuan','jadwal.tujuan = Tujuan.id','left');
        return $this->db->get('jadwal');
    }
    public function getTiket(){  
        return $this->db->get('tiket');
    }
    public function insertPenumpang($data){  
        return $this->db->insert('penumpang',$data);
    }
    public function insertPemesan($data){  
        return $this->db->insert('tiket',$data);
    }

    public function insertPembayaran($data){  
        return $this->db->insert('pembayaran',$data);
    }
    public function getPembayaran(){  
        return $this->db->get('pembayaran');
    }
    public function getPembayaranwhere($kode){ 
        $this->db->where('no_pembayaran',$kode);
        return $this->db->get('pembayaran');
    }
    public function cekKonfirmasi($no_tiket){ 
        $this->db->where('nomor_tiket',$no_tiket);
        return $this->db->get('penumpang');
    }
    public function insertBukti($nama,$no){ 
        $data = array (
            'bukti' => $nama,
            'status' => 1
        );
        $this->db->where('no_pembayaran',$no);
        return $this->db->update('pembayaran',$data);
    }
    public function getTiketWhere($tiket){ 
        return $this->db->get_where('tiket', array('nomor_tiket'=> $tiket));
    }
    public function getPrint($no_tiket){ 
        $this->db->select('*,Asal.kota as ASAL, Tujuan.kota as TUJUAN');
        $this->db->join('jadwal','jadwal.id=tiket.id_jadwal');
        $this->db->join('terminal as Asal','jadwal.asal = Asal.id','left');
        $this->db->join('terminal as Tujuan','jadwal.tujuan = Tujuan.id','left');
        $this->db->where('nomor_tiket', $no_tiket);
        return $this->db->get('tiket');
    }
    
}