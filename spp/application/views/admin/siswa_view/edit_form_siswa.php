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
                        <a href="<?php echo site_url('admin/siswa/') ?>"><i class="fas fa-arrow-left"></i>
                            Kembali</a>
                    </div>
                    <div class="card-body">

                        <form action="<?php base_url("admin/siswa/edit") ?>" method="post"
                            enctype="multipart/form-data" >

                            <input type="hidden" name="nisn" value="<?php echo $siswa->nisn?>" />

                            <div class="form-group">
                                <label for="nis">Nis*</label>
                                <input class="form-control <?php echo form_error('nis') ? 'is-invalid':'' ?>"
                                 type="number" name="nis" min="0" placeholder="nis" value="<?php echo $siswa->nis ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('nis') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama*</label>
                                <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
                                 type="text" name="nama" min="0" placeholder="nama" value="<?php echo $siswa->nama ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('nama') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="spp">Pilih Kelas*</label>
                                    <select class="form-control" name="id_kelas" id="id_kelas" required>
                                       <option value="">Pilih Kelas</option>
                                            <?php foreach ($id_kelas as $row) { ?>
                                        <option <?php if($row->id_kelas ==$siswa->id_kelas){ echo 'selected="selected"'; } ?> 
                                            value="<?php echo $row->id_kelas ?>"><?php echo $row->nama_kelas?> </option>
                                            <?php } ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat*</label>
                                <input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
                                 type="text" name="alamat" min="0" placeholder="alamat" value="<?php echo $siswa->alamat ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('alamat') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="id_telp">No Telepon*</label>
                                <input class="form-control <?php echo form_error('id_telp') ? 'is-invalid':'' ?>"
                                 type="number" name="id_telp" min="0" placeholder="id_telp" value="<?php echo $siswa->id_telp ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('id_telp') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="id_login">ID Login*</label>
                                <input class="form-control <?php echo form_error('id_login') ? 'is-invalid':'' ?>"
                                 type="number" name="id_login" min="0" placeholder="id_login" value="<?php echo $siswa->id_login ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('id_login') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="spp">Pilih Tahun SPP*</label>
                                    <select class="form-control" name="id_spp" id="id_spp" required>
                                        <option value="">Pilih Tahun SPP</option>
                                            <?php foreach ($id_spp as $row) { ?>
                                        <option <?php if($row->id_spp ==$siswa->id_spp){ echo 'selected="selected"'; } ?> 
                                            value="<?php echo $row->id_spp ?>"><?php echo $row->tahun?> </option>
                                            <?php } ?>
                                    </select>
                            </div>
                            <input class="btn btn-success" type="submit" name="btn" value="Save" />
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

