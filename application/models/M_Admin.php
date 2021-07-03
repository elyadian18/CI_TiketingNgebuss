<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {
    public function cekLogin($data){
        
        return $this->db->get_where('admin',$data)->num_rows();
    }
    public function getDataTerminal(){
        
        return $this->db->get('terminal');
    }
    public function getDataPenupang(){
        $this->db->select('*');
        $this->db->from('penumpang');
        $this->db->join('pembayaran','pembayaran.no_tiket = penumpang.nomor_tiket');
        $this->db->join('tiket','tiket.nomor_tiket = penumpang.nomor_tiket');	
        $query = $this->db->get();
        return $query;
    }

    public function tambah_terminal($nama){
        $data = array (
            'kota' => $nama,
        );
        return $this->db->insert('terminal',$data);
    }

    public function delete_terminal($id){
        $this->db->where('id',$id);
        return $this->db->delete('terminal');
    }

    public function getDataEditTerminal($id){
        $data = array (
            'id' => $id,
        );
        return $this->db->get_where('terminal',$data);
    }
    public function edit_terminal($nama){
        $data = array (
            'kota' => $nama,
        );
        $this->db->where('id',$this->input->post('id'));
        return $this->db->update('terminal',$data);
    }
    public function tambah_jadwal($data){
        return $this->db->insert('jadwal',$data);
    }
    public function getJadwal(){
        // SELECT COUNT(penumpang.id) AS jmlpenumpang FROM penumpang INNER JOIN tiket ON penumpang.nomor_tiket = tiket.nomor_tiket WHERE tiket.nama_kota='SINAR JAYA'
        $this->db->select('jadwal.*, Asal.kota as ASAL, Tujuan.kota as TUJUAN');
        //$this->db->select('nama_kota, count(*) as total');    
        $this->db->from('jadwal');
        $this->db->join('terminal as Asal','jadwal.asal = Asal.id','left');
        $this->db->join('terminal as Tujuan','jadwal.tujuan = Tujuan.id','left');
        //$this->db->join('tiket','tiket.nama_kota = jadwal.nama_kota');
        
        return $this->db->get();
    }
    public function delete_jadwal($id){
        $this->db->where('id',$id);
        return $this->db->delete('jadwal');
    }
    public function delete_penumpang($id){
        $this->db->where('id',$id);
        return $this->db->delete('penumpang');
    }

    public function getDataEditJadwal($id){
        $data = array (
            'jadwal.id' => $id,
        );
        $this->db->select('jadwal.*, Asal.kota as ASAL, Tujuan.kota as TUJUAN');
        $this->db->from('jadwal');
        $this->db->where($data);
        $this->db->join('terminal as Asal','jadwal.asal = Asal.id','left');
        $this->db->join('terminal as Tujuan','jadwal.tujuan = Tujuan.id','left');
        return $this->db->get();
    }
    public function edit_jadwal($data){
        $this->db->where('id',$this->input->post('id'));
        return $this->db->update('jadwal',$data);
    }
    public function getKonfirmasiPembayaran(){
        $where = array (
            'status' => 1
        );
        return $this->db->get_where('pembayaran',$where);
    }
    public function updatePembayaran($id){
        $data = array (
            'status' => 2
        );
        $this->db->where('id',$id);
        return $this->db->update('pembayaran',$data);
    }
    public function prosesBerangkat($id){
        $data = array (
            'status' => 1
        );
        $this->db->where('id',$id);
        return $this->db->update('jadwal',$data);
    }

    public function getKursi(){
        return $this->db->get('kursi');
    }
}