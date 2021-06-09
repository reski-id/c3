<?php

class Artikel_model extends CI_Model
{
    private $_table = "tbl_penulis";

    public function viewArtikel()
    {
        $this->db->select('id, judul, penulis, LEFT(isi, 20) AS isi');
        $this->db->order_by('id', 'DESC');
        return $this->db->get($this->_table)->result_array();
    }

    public function tambahartikel()
    {
        
        $data = array(
            'judul' => $this->input->post('judul', true),
            'penulis' => $this->input->post('penulis', true),
            'isi' => $this->input->post('isi', true),
            'tanggal_input' => date("Y-m-d H:i:s"),
            'tanggal_update' => NULL,
        );

        //masukan data yang berhasil di input tiap-tiap field
        $this->db->insert($this->_table, $data);
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->_table);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['id' => $id])->row_array();
    }

    public function ubahartikel()
    {
        $data = array(
            'judul' => $this->input->post('judul'),
            'penulis' => $this->input->post('penulis'),
            'isi' => $this->input->post('isi'),
            'tanggal_update' => date("Y-m-d H:i:s"),
        );

        //cari id berdasarkan id yang ada dalam inputan
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->_table, $data);

    }

}