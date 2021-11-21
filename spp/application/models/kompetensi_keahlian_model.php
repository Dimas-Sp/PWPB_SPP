<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kompetensi_keahlian_model extends CI_Model
{
   private $_table = "kompetensi_keahlian";

   public $id_kk;
   public $nama_kk;

  public function getAll()
  {
     $query = $this->db->get('kompetensi_keahlian');
    return $query->result();
  }

  function get_kk() { 

  		$result = $this->db-> get('kompetensi_keahlian');
		
		$kk[''] = 'Pilih Kompetensi Keahlian';  
        //$kk = array();
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $kk[$row->id_kk] = $row->nama_kk;
            }
        }
        return $kk; 

    } 

  function get_kkById() { 

  		$result = $this->db-> get('kompetensi_keahlian');
		
		$kk[''] = 'Pilih Kompetensi Keahlian';  
        $kk = array();
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $kk[$row->id_kk] = $row->nama_kk;
            }
        }
        return $kk; 

    } 



}