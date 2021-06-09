<?php 

class Murid extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Murid_model');
    }
    
    public function index()
    {
        $data['murid'] = $this->Murid_model->viewMurid();
        $this->load->view('murid', $data);
    }

    public function tambah()
    {
        $validation = $this->form_validation; //untuk menghemat penulisan kode

        $validation->set_rules('nama', 'Nama', 'required');
        $validation->set_rules('nisn', 'NISN', 'required');
        $validation->set_rules('kelas', 'Kelas', 'required');
        $validation->set_rules('alamat', 'Alamat', 'required');

        if($validation->run() == FALSE) //jika form validation gagal tampilkan kembali form tambahnya
        {
            $this->load->view('tambah');
        } else {
          $this->Murid_model->tambahMurid();
          $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil masuk kedalam database</div>');
          redirect('murid');
        }  
    }

    public function hapus($id)
    {
        $this->Murid_model->hapus($id);
        redirect('murid');
    }

    public function ubah($id)
    {
        $validation = $this->form_validation; //untuk menghemat penulisan kode
        $data['murid'] = $this->Murid_model->getById($id);

        $validation->set_rules('nama', 'Nama', 'required');
        $validation->set_rules('nisn', 'NISN', 'required');
        $validation->set_rules('kelas', 'Kelas', 'required');
        $validation->set_rules('alamat', 'Alamat', 'required');

        if ($validation->run() == FALSE) //jika form validation gagal tampilkan kembali form tambahnya
        {
            $this->load->view('ubah', $data);
        } else {
            $this->Murid_model->ubahMurid();
            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
            redirect('murid');
        }
    }

}