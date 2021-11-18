<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_model extends CI_Model
{
    private $_table = "petugas";

    public $id_petugas;
    public $nama_petugas;
    public $id_login;
    public $image;
    


    public function rules()
    {
        return [
            ['field' => 'nama_petugas',
            'label' => 'Nama_petugas',
            'rules' => 'required'],

            ['field' => 'id_login',
            'label' => 'Id_login',
            'rules' => 'required'],

            ['field' => 'image',
            'label' => 'Image',
            'rules' => 'required'],
            
            
        ];
    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_petugas" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_petugas = $post["id_petugas"];
        $this->nama_petugas = $post["nama_petugas"];
        $this->id_login = $post["id_login"];
        $this->image = $post["image"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_petugas = $post["id_petugas"];
        $this->nama_petugas = $post["nama_petugas"];
        $this->id_login = $post["id_login"];
        $this->image = $post["image"];
        $this->db->update($this->_table, $this, array('id_petugas' => $post['id_petugas']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_petugas" => $id));
    }
}
