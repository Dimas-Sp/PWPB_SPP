<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php')?>
</head>

<body id="page-top">
  <div id="wrapper">
		
	<!-- Sidebar -->
    <?php $this->load->view('admin/_partials/sidebar.php')?>
    
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
				
        <!-- TopBar -->
        <?php $this->load->view('admin/_partials/navbar.php')?>
        <!-- Topbar -->

       

          <!-- MAIN CONTENT-->
		  <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="card mb-3">
                        <div class="card-header">
                             <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        </div>
                        </div>
                   
                        <div class="card mb-3">
                        <div class="card-header">
                            <a href="<?php echo site_url('admin/pembayaran/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="card-body">
                            <form action="<?php base_url('admin/pembayaran/add') ?>" class="row g-3" style="width:136rem;" method="post" enctype="multipart/form-data" >
                                
                                
                                <div class="form-group col-md-3">
                                    <label for="id_petugas">Pilih Petugas*</label>
                                    <select class="form-control" name="id_petugas" id="id_petugas">
                                        <option value="">Pilih Petugas...</option>
                                        <?php foreach($id_petugas as $row):?>
                                            <option value="<?php echo $row->id_petugas;?>"><?php echo $row->nama_petugas;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="nisn">Pilih Nisn*</label>
                                    <select class="form-control" name="nisn" id="nisn">
                                        <option value="">Pilih Nisn...</option>
                                        <?php foreach($nisn as $row):?>
                                            <option value="<?php echo $row->nisn;?>"><?php echo $row->nisn;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tgl_bayar">Tanggal Bayar*</label>
                                    <input class="form-control <?php echo form_error('tgl_bayar') ? 'is-invalid':'' ?>"
                                     type="date" name="tgl_bayar" min="0" placeholder="tgl_bayar" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tgl_bayar') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="bulan_dibayar">Bulan Dibayar*</label>
                                    <input class="form-control <?php echo form_error('bulan_dibayar') ? 'is-invalid':'' ?>"
                                     type="text" name="bulan_dibayar" min="0" placeholder="bulan dibayar" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('bulan_dibayar') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="tahun_dibayar">Tahun Dibayar*</label>
                                    <input class="form-control <?php echo form_error('tahun_dibayar') ? 'is-invalid':'' ?>"
                                     type="number" name="tahun_dibayar" min="0" placeholder="tahun dibayar" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tahun_dibayar') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="id_spp">Pilih Nominal*</label>
                                    <select class="form-control" name="id_spp" id="id_spp">
                                        <option value="">Pilih Nominal...</option>
                                        <?php foreach($id_spp as $row):?>
                                            <option value="<?php echo $row->id_spp;?>"><?php echo rupiah($row->nominal);?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="jumlah_bayar">Jumlah Bayar*</label>
                                    <input class="form-control <?php echo form_error('jumlah_bayar') ? 'is-invalid':'' ?>"
                                     type="number" name="jumlah_bayar" min="0" placeholder="jumlah bayar" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('jumlah_bayar') ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                                </div>
                            </form>
                        </div>
                        <div class="card-footer small text-muted">
                            * required fields
                        </div>
                    </div>
                   <?php $this->load->view("admin/_partials/footer.php") ?>
                </div>
            </div>
            <!-- END MAIN CONTENT-->

          <!-- Modal Logout -->
          <?php $this->load->view('admin/_partials/modal.php')?>

        </div>
        <!---Container Fluid-->
      </div>
      
    </div>
  </div>

  <!-- Scroll to top -->
  <?php $this->load->view('admin/_partials/scrolltop.php')?>

  <?php $this->load->view('admin/_partials/js.php')?>
</body>

</html>


                                
                                