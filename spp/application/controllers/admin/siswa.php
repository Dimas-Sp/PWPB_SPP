<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['siswa_model', 'kelas_model', 'spp_model']);
        $this->load->library('form_validation');
        // $this->load->helper('rupiah_helper');
    }

    public function index()
    {   
        // if($this->session->userdata('akses') =='admin' || $this->session->userdata('akses')=='petugas'){
            $data["siswa"] = $this->siswa_model->getAll();
            $this->load->view("admin/siswa_view/view_siswa", $data);
        // }   
        // else
        // {
        //     echo "Anda tidak berhak mengakses halaman ini";
        // }
           
    }

    public function add()
    {   
        // if($this->session->userdata('akses')=='admin' || $this->session->userdata('akses')=='petugas'){
            $data['id_kelas'] = $this->kelas_model->getKelas()->result();
            $data['id_spp'] = $this->spp_model->getAll();
            $siswa = $this->siswa_model;
            $validation = $this->form_validation;
            $validation->set_rules($siswa->rules());

            if ($validation->run()) {
                $siswa->save();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }

            $this->load->view("admin/siswa_view/new_form_siswa",$data);
        // }   
        // else
        // {
        //     echo "Anda tidak berhak mengakses halaman ini";
        // }
    }

    public function edit($id = null)
    {
        $data['id_kelas'] = $this->kelas_model->getkelas()->result();
        $data['id_spp'] = $this->spp_model->getAll();
        
        if (!isset($id)) redirect('admin/siswa');
       
        $siswa = $this->siswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($siswa->rules());

        if ($validation->run()) {
            $siswa->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/siswa'));
        }

        $data["siswa"] = $siswa->getById($id);
        if (!$data["siswa"]) show_404();
        
        $this->load->view("admin/siswa_view/edit_form_siswa", $data);
    }

    

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->siswa_model->delete($id)) {
            redirect(site_url('admin/siswa'));
        }
    }

    public function cetak()
    {
        // load view yang akan digenerate atau diconvert
        // contoh kita akan membuat pdf dari halaman welcome codeigniter
         $data["spp"] = $this->spp_model->getAll();
        $this->load->view("admin/spp_view/cetak", $data);
        // dapatkan output html
        
        $html = $this->output->get_output();
        
        // Load/panggil library dompdfnya
        $this->load->library('dompdf_gen');
        
        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();

        
        
        //utk menampilkan preview pdf
        $this->dompdf->stream("welcome.pdf",array('Attachment'=>0));
        //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
        //$this->dompdf->stream("welcome.pdf");
    }
}
