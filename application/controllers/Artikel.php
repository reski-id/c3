<?php 

class Artikel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Artikel_model');
    }
    
    public function index()
    {
        $data['artikel'] = $this->Artikel_model->viewArtikel();
        $this->load->view('artikel_view', $data);
    }

    public function tambah()
    {
        $validation = $this->form_validation; 
        $validation->set_rules('judul', 'judul', 'required');
        $validation->set_rules('penulis', 'penulis', 'required');
        $validation->set_rules('isi', 'isi', 'required');

        if($validation->run() == FALSE) //jika form validation gagal tampilkan kembali form tambahnya
        {
            $this->load->view('tambah_artikel_view');
        } else {
          $this->Artikel_model->tambahartikel();
          $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil masuk kedalam database</div>');
          redirect('artikel');
        }  
    }

    public function hapus($id)
    {
        $this->Artikel_model->hapus($id);
        redirect('artikel');
    }

    public function ubah($id)
    {
        $validation = $this->form_validation; //untuk menghemat penulisan kode
        $data['artikel'] = $this->Artikel_model->getById($id);

      
        $validation->set_rules('judul', 'judul', 'required');
        $validation->set_rules('penulis', 'penulis', 'required');
        $validation->set_rules('isi', 'isi', 'required');

        if ($validation->run() == FALSE) //jika form validation gagal tampilkan kembali form tambahnya
        {
            $this->load->view('ubah_artikel_view', $data);
        } else {
            $this->Artikel_model->ubahartikel();
            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
            redirect('artikel');
        }
    }

}