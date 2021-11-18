<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
    private $_table = "pembayaran";

    public $id_pembayaran;
    public $id_petugas;
    public $nisn;
    public $tgl_bayar;
    public $id_spp;
    public $jumlah_bayar;
    public $bulan_dibayar;
    public $tahun_dibayar;


    public function rules()
    {
        return [
            ['field' => 'id_pembayaran',
            'label' => 'Id_pembayaran',
            'rules' => 'required'],

            ['field' => 'id_petugas',
            'label' => 'Id_petugas',
            'rules' => 'numeric'],
            
            
        ];
    }


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pembayaran" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_pembayaran = $post["id_pembayaran"];
        $this->id_petugas = $post["id_petugas"];
        $this->nisn = $post["nisn"];
        $this->tgl_bayar = $post["tgl_bayar"];
        $this->id_spp = $post["id_spp"];
        $this->jumlah_bayar = $post["jumlah_bayar"];
        $this->bulan_dibayar = $post["bulan_dibayar"];
        $this->tahun_dibayar = $post["tahun_dibayar"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pembayaran = $post["id_pembayaran"];
        $this->id_petugas = $post["id_petugas"];
        $this->nisn = $post["nisn"];
        $this->tgl_bayar = $post["tgl_bayar"];
        $this->id_spp = $post["id_spp"];
        $this->jumlah_bayar = $post["jumlah_bayar"];
        $this->bulan_dibayar = $post["bulan_dibayar"];
        $this->tahun_dibayar = $post["tahun_dibayar"];
        $this->db->update($this->_table, $this, array('id_pembayaran' => $post['id_pembayaran']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_petugas" => $id));
    }
}
