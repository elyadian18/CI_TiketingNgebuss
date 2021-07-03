<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function keHalamanLogin(){        
        $this->load->view('Admin/login');
    }

    public function login(){                
        $data = array (
            'username' => $this->input->post('username'),
            'password' => sha1($this->input->post('password'))
        );
        $cek = $this->M_Admin->ceklogin($data);    
        if ($cek >0) {
            $sess = array (
            'status' => TRUE,
            'level' => 'admin'
            );       
            $this->session->set_userdata($sess);
            
            redirect(base_url('admin/dashboard'));
        }else {
            redirect(base_url('login'));
        }
    }
    
    public function logout(){
        session_destroy();
        redirect(base_url());
    }
    public function keHalamanDashboard(){
        if ($this->session->status === TRUE) {
            $data['terminal'] = $this ->M_Admin->getDataTerminal()->result();
            $this->load->view('admin/dashboard',$data);
        }else {
            redirect(base_url('login'));
        }
    }
    public function tambah_terminal(){
        $nama = $this -> input -> post('terminal');

        $input = $this->M_Admin->tambah_terminal($nama);

        redirect(base_url('admin/dashboard'));
    }
    public function hapus_terminal($id){
        $delete = $this->M_Admin->delete_terminal($id);

        redirect(base_url('admin/dashboard'));
    }
    public function keHalamanEdit($id){
        $data['data_terminal'] = $this->M_Admin->getDataEditTerminal($id) -> row();
        $this->load->view('admin/edit_terminal',$data);
    }
    public function edit_terminal(){
        $nama = $this -> input -> post('kota');
        $edit = $this->M_Admin->edit_terminal($nama);
        redirect(base_url('admin/dashboard'));
    }
    public function keHalamanPenumpang(){    
        $data['penumpang'] = $this->M_Admin->getDataPenupang()->result();
        $this->load->view('Admin/data_penumpang',$data);
    }
    public function keHalamanKelolaJadwal(){    
        $data['terminal'] = $this->M_Admin->getDataTerminal()->result();
        $data['jadwal'] = $this->M_Admin->getJadwal()->result();
        $this->load->view('Admin/kelola_jadwal',$data);        
    }
    public function tambah_jadwal(){
        $data = array (
            'nama_kota' => $this->input->post('nama_bus'),
            'asal' => $this->input->post('asal'),
            'tujuan' => $this->input->post('tujuan'),
            'tgl_berangkat' => $this->input->post('tgl_berangkat'),
            'tgl_sampai' => $this->input->post('tgl_sampai'),
            'kelas' => $this->input->post('kelas'),
            'harga' => $this->input->post('harga'),
        );
        $this->M_Admin->tambah_jadwal($data);
        redirect(base_url('admin/dashboard/kelola-jadwal'));
    }
    public function hapus_jadwal($id){
        $delete = $this->M_Admin->delete_jadwal($id);

        redirect(base_url('admin/dashboard/kelola-jadwal'));
    }
    public function keHalamanEditJadwal($id){
        $data['data_edit'] = $this->M_Admin->getDataEditJadwal($id)-> row();
        $data['terminal'] = $this->M_Admin->getDataTerminal()->result();
        $this->load->view('Admin/edit_jadwal',$data);
    }
    public function edit_jadwal(){
        $data = array (
            'nama_kota' => $this->input->post('nama_bus'),
            'asal' => $this->input->post('asal'),
            'tujuan' => $this->input->post('tujuan'),
            'tgl_berangkat' => $this->input->post('tgl_berangkat'),
            'tgl_sampai' => $this->input->post('tgl_sampai'),
            'kelas' => $this->input->post('kelas'),
            'harga' => $this->input->post('harga'),
        );
        $this->M_Admin->edit_jadwal($data);
        redirect(base_url('admin/dashboard/kelola-jadwal'));
    }
    public function keHalamanKonfirmasi(){    
        $data ['list'] = $this->M_Admin->getKonfirmasiPembayaran()->result();
        $this->load->view('Admin/konfirmasi_pembayaran',$data);
    }
    public function verifikasiPembayaran($id){    
        $update = $this->M_Admin->updatePembayaran($id);
            if($update){
                $this->session->set_flashdata('pesan','Verifikasi Berhasil');
                redirect('admin/konfirmasi-pembayaran'); 
            }else {
                echo "Verifikasi Gagal";
            }
    }
    public function prosesBerangkat($id){    
        $update = $this->M_Admin->prosesBerangkat($id);
            if($update){
                $this->session->set_flashdata('pesan','Bus Berangkat');
                redirect('admin/dashboard/kelola-jadwal'); 
            }else {
                echo "Gagal";
            }
    }
    public function hapus_penumpang($id){
        $delete = $this->M_Admin->delete_penumpang($id);

        redirect(base_url('admin/dashboard/data-penumpang'));
    }

}


