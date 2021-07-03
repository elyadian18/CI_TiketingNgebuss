<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

        public function keHalamanDepan(){
            $data['judul'] = 'Halaman Depan';
            $data['terminal'] = $this ->M_Guest->getDataKota()->result();
            $this->load->view('Guest/template/header',$data);
            $this->load->view('Guest/halaman_depan');
            $this->load->view('Guest/template/footer');
        }
        public function keHalamanKonfirmasi(){
            $data['judul'] = 'Halaman Konfirmasi';

            if(isset($_GET['kode'])):
                $kode = $_GET['kode'];
                $data['no_tiket']= $this->M_Guest->getPembayaranwhere($kode)->row();
                $tiket = $this->M_Guest->getTiketWhere($data['no_tiket']->no_tiket)->row();                   
                $data['detail'] = $this->M_Guest->cekKonfirmasi($data['no_tiket']->no_tiket)->result();
                
            endif;
            $this->load->view('Guest/template/header',$data);
            $this->load->view('Guest/halaman_konfirmasi');
            $this->load->view('Guest/template/footer');
        }
        public function cariTiket(){
            $data = array (
                'asal' => $this->input->post('asal'),
                'tujuan' => $this->input->post('tujuan'),
                'status' => 0
            );
            $data['tiket'] = $this->M_Guest->cari_tiket($data)->result(); 
            $data['penumpang'] = $this->input->post('jumlah');
            $data['judul'] = 'Halaman Depan';
            $data['terminal'] = $this ->M_Guest->getDataKota()->result();
            $this->load->view('Guest/template/header',$data);
            $this->load->view('Guest/halaman_depan');
            $this->load->view('Guest/template/footer');
        }
        public function pesan($id){
            $data['judul'] = 'Formulir Data Diri';
            $data['info'] = $this ->M_Guest->getDataInfoPesan($id)->row();
            $data['id_jadwal'] = $id;

            $this->load->view('Guest/template/header',$data);
            $this->load->view('Guest/data_diri');
            $this->load->view('Guest/template/footer');
        }
        public function pesanTiket(){
            $penumpang = $this->input->post('penumpang');
            
            //Generate nomor pembayaran
            $cek = $this->M_Guest->getPembayaran()->num_rows()+1;

            $no_pembayaran = 'P40'.$cek;

            //Generate nomor tiket
            $cek = $this->M_Guest->getTiket()->num_rows()+1;
            
            $no_tiket = 'T00'.$cek;
            $harga = $this->input->post('harga');
            $total_pembayaran = $penumpang*$harga;

            //Input Pembayaran
            $data = array (
                'no_pembayaran' => $no_pembayaran,
                'no_tiket' => $no_tiket,
                'total_pembayaran' => $total_pembayaran,
                'status' => 0,
            ); 
            
            $this->M_Guest->insertPembayaran($data);
            //Input data penumpang
            for ($i=1; $i <=$penumpang ; $i++) { 
                $data = array (
                    'nomor_tiket' => $no_tiket,
                    'nama' => $this->input->post('nama'.$i),
                    'no_identitas' => $this->input->post('no_identitas'.$i)
                ); 
                $this->M_Guest->insertPenumpang($data);    
            }
            //input data pemesan
            $data = array (
                'nomor_tiket' => $no_tiket,
                'id_jadwal' => $this->input->post('id_jadwal'),
                'nama_kota' => $this->input->post('nama_kota'),
                'tgl_berangkat' => $this->input->post('tgl_berangkat'),
                'nama_pemesan' => $this->input->post('nama_pemesan'),
                'email' => $this->input->post('email'),
                'no_telepon' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat'),
                'tanggal' => date('Y-m-d h:i:s')
            );
            $this->M_Guest->insertPemesan($data);
            $this->session->set_flashdata('nomor',$no_pembayaran);
            $this->session->set_flashdata('total',$total_pembayaran);
            redirect('pembayaran',$total_pembayaran);
        }
        public function keHalamanPembayaran(){
            $data['judul'] = 'Konfirmasi Pembayaran';
            $this->load->view('Guest/template/header',$data);
            $this->load->view('Guest/pembayaran');
            $this->load->view('Guest/template/footer');
        }
        public function cekKonfirmasi(){
            $kode = $this->input->post('kode');
            redirect('konfirmasi?kode='.$kode,$no_tiket);
        }
        public function kirimKonfirmasi(){
            //upload gambar
            $config['upload_path']          = './assets/bukti/';
            $config['allowed_types']        = '|jpg|png';
            $config['max_size']             = 2048;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);
            if ( !$this->upload->do_upload('gambar'))            {
                $error = array('error' => $this->upload->display_errors());

                redirect('konfirmasi', $error);
            }else{
                $data = $this->upload->data();
                $filename = $data['file_name'];
                $no = $this->input->post('no_pembayaran');
                $this->M_Guest->insertBukti($filename,$no);
                $this->session->flashdata('pesan','Berhasil Mengirim Bukti. Silahkan Cek Kembali Pembayaran anda Setelah 12 jam ');
                redirect('konfirmasi');
            }

            //pemilihan kursi
            $data = array (
                'kursi' => $this->input->post('kursi'),
            );
            $this->M_Guest->pilihKursi($data,$no);
        }
        public function print(){
            $data['judul'] = 'Print';
            $no_tiket = $this->input->post('no_tiket');
            $data['detail'] = $this->M_Guest->getPrint($no_tiket)->row();
            $data['jml_penumpang'] = $this->M_Guest->cekKonfirmasi($no_tiket)->num_rows();

            
            $this->load->view('Guest/template/header',$data);
            $this->load->view('print',$data);
            $this->load->view('Guest/template/footer',$data);
        }


}
