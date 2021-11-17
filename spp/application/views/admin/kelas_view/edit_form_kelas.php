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
                        <a href="<?php echo site_url('admin/kelas/') ?>"><i class="fas fa-arrow-left"></i>
                            Kembali</a>
                    </div>
                    <div class="card-body">

                        <form action="<?php base_url("admin/kelas/edit") ?>" method="post"
                            enctype="multipart/form-data" >

                            <input type="hidden" name="id" value="<?php echo $kelas->id_kelas?>" />

                            <div class="form-group">
                                <label for="nama_kelas">Nama Kelas*</label>
                                <input class="form-control <?php echo form_error('nama_kelas') ? 'is-invalid':'' ?>"
                                 type="text" name="nama_kelas" placeholder="Nama Kelas" value="<?php echo $kelas->nama_kelas ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('nama_kelas') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="id_kk">Kompetensi Keahlian*</label>
                                <input class="form-control <?php echo form_error('id_kk') ? 'is-invalid':'' ?>"
                                 type="number" name="id_kk" min="0" placeholder="id_kk" value="<?php echo $kelas->id_kk ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('id_kk') ?>
                                </div>
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

