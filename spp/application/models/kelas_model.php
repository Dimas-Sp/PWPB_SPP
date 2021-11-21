<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model
{
    private $_table = "kelas";

    public $id_kelas;
    public $nama_kelas;
    public $id_kk;

    public function rules()
    {
        return [
            ['field' => 'nama_kelas',
            'label' => 'Nama_kelas',
            'rules' => 'required'],

            ['field' => 'id_kk',
            'label' => 'Id_kk',
            'rules' => 'numeric'],
            
        ];
    }


    public function getAll()
    {
        $this->db->select("kelas.*, kompetensi_keahlian.id_kk, kompetensi_keahlian.nama_kk ");
        $this->db->from("kelas");
        $this->db->join("kompetensi_keahlian", "kelas.id_kk = kompetensi_keahlian.id_kk", "inner");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kelas" => $id])->row();
        
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_kelas = uniqid();
        $this->nama_kelas = $post["nama_kelas"];
        $this->id_kk = $post["id_kk"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_kelas = $post["id"];
        $this->nama_kelas = $post["nama_kelas"];
        $this->id_kk = $post["id_kk"];
        $this->db->update($this->_table, $this, array('id_kelas' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kelas" => $id));
    }
}
