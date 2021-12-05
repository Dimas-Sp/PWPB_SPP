<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("petugas_model");
        $this->load->library('form_validation');
        // $this->load->helper('rupiah_helper');
    }

    public function index()
    {   
        if($this->session->userdata('akses') =='admin' || $this->session->userdata('akses')=='petugas'){
            $data["petugas"] = $this->petugas_model->getAll();
            $this->load->view("admin/petugas_view/view_petugas", $data);
        }   
        else
        {
            echo "Anda tidak berhak mengakses halaman ini";
        }
           
    }

    public function add()
    {   
        if($this->session->userdata('akses')=='admin' || $this->session->userdata('akses')=='petugas'){
            
            $petugas = $this->petugas_model;
            $validation = $this->form_validation;
            $validation->set_rules($petugas->rules());

            if($validation->run()){
                $petugas->save();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }
            
            

            $this->load->view("admin/petugas_view/new_form_petugas");
        }   
        else
        {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/petugas');
       
        $petugas = $this->petugas_model;
        $validation = $this->form_validation;
        $validation->set_rules($petugas->rules());

        if ($validation->run()) {
            $petugas->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/petugas'));
        }

        $data["petugas"] = $petugas->getById($id);
        if (!$data["petugas"]) show_404();
        
        $this->load->view("admin/petugas_view/edit_form_petugas", $data);
    }

    

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->petugas_model->delete($id)) {
            redirect(site_url('admin/petugas'));
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
