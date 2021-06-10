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
        // $data['murid'] = $this->Murid_model->viewMurid();
        $jumlah_data = $this->Murid_model->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'murid/index/';
        $config['total_rows'] = $jumlah_data;
		$config['per_page'] = 1;
        $from = $this->uri->segment(3);
        
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';


		$this->pagination->initialize($config);		
		$data['murid'] = $this->Murid_model->data($config['per_page'],$from);
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