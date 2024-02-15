<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengembalian_model'); // Pastikan nama model sudah benar
        $this->load->library('form_validation'); // Load library form_validation
    }

    public function index()
    {
        $data['title'] = 'Pengembalian';
        $data['pengembalian'] = $this->pengembalian_model->get_data('pengembalian')->result(); 
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pengembalian', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Pengembalian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_pengembalian', $data);
        $this->load->view('templates/footer');
    }
    
    public function tambah_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'tgl_kembali' => $this->input->post('tgl_pengembalian'), 
                'kd_pinjam' => $this->input->post('kd_pinjam'),
                'denda' => $this->input->post('denda'),
                'tgl_jatuh_tempo' => $this->input->post('tgl_jatuh_tempo'), 
            );
            
            $this->pengembalian_model->insert_data($data, 'pengembalian'); // Menghilangkan tanda ">" yang tidak diperlukan
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button></div>');
            redirect('pengembalian');
        }
    }
    
    public function edit($kd_kembali)
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'tgl_kembali' => $this->input->post('tgl_kembali'),
                'kd_pinjam' => $this->input->post('kd_pinjam'), 
                'denda' => $this->input->post('denda'),
                'tgl_jatuh_tempo' => $this->input->post('tgl_jatuh_tempo'),
            );
            $this->pengembalian_model->update_data($kd_kembali, $data, 'pengembalian'); // Menghilangkan tanda ">" yang tidak diperlukan
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button></div>');
            redirect('pengembalian');
        }
    }
    
    public function _rules()
    {
        $this->form_validation->set_rules('tgl_pengembalian', 'Tgl Kembali', 'required', array('required' => '%s harus diisi !!!'));
        $this->form_validation->set_rules('kd_pinjam', 'Kd Pinjam', 'required', array('required' => '%s harus diisi !!!'));
        $this->form_validation->set_rules('denda', 'Denda', 'required', array('required' => '%s harus diisi !!!'));
        $this->form_validation->set_rules('tgl_jatuh_tempo', 'Tgl Jatuh Tempo', 'required', array('required' => '%s harus diisi !!!'));
    }
    
    public function delete($id)
    {
        $where = array('kd_kembali' => $id);
        $this->pengembalian_model->delete($where, 'kd_kembali');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button></div>');
        redirect('pengembalian');
    }
}
