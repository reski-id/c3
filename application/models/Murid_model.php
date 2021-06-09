<?php

class Murid_model extends CI_Model
{
    private $_table = "murid";

    public function viewMurid()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function tambahMurid()
    {
        $data = array(
            'nama' => $this->input->post('nama', true),
            'nisn' => $this->input->post('nisn', true),
            'kelas' => $this->input->post('kelas', true),
            'alamat' => $this->input->post('alamat', true)
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

    public function ubahMurid()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'nisn' => $this->input->post('nisn'),
            'kelas' => $this->input->post('kelas'),
            'alamat' => $this->input->post('alamat')
        );

        //cari id berdasarkan id yang ada dalam inputan
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->_table, $data);

    }

}