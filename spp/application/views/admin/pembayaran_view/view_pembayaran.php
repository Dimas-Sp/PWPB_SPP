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
                            <table>
                                <tr>
                                    <td width="150"><a href="<?php echo site_url('admin/pembayaran/add') ?>"><i class="fas fa-plus"></i> Tambah Data </a></td>
                                    
                                </tr>
                            </table>
                            

                            
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        
                                        <th>Nama&nbsp;Petugas</th>
                                        <th>Nisn</th>
                                        <th>Tanggal&nbsp;Bayar</th>
                                        <th>Bulan&nbsp;Dibayar</th>
                                        <th>Tahun&nbsp;Dibayar</th>
                                        <th>Nominal</th>
                                        <th>Jumlah&nbsp;Bayar</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pembayaran as $ipembayaran): ?>
                                    <tr>
                                        
                                        <td width="150">
                                            <?php echo ($ipembayaran->nama_petugas) ?>
                                        </td>
                                        <td>
                                            <?php echo ($ipembayaran->nisn) ?>
                                        </td>
                                        <td>
                                            <?php echo ($ipembayaran->tgl_bayar) ?>
                                        </td>
                                        <td>
                                            <?php echo ($ipembayaran->bulan_dibayar) ?>
                                        </td>
                                        <td>
                                            <?php echo ($ipembayaran->tahun_dibayar) ?>
                                        </td>
                                        <td>
                                            <?php echo rupiah($ipembayaran->nominal) ?>
                                        </td>
                                        <td>
                                            <?php echo rupiah($ipembayaran->jumlah_bayar) ?>
                                        </td>
                                        <td width="250">
                                            <a href="<?php echo site_url('admin/pembayaran/edit/'.$ipembayaran->id_pembayaran) ?>"
                                             class="btn btn-small"><i class="fas fa-edit"></i> Ubah</a>
                                            <a onclick="deleteConfirm('<?php echo site_url('admin/pembayaran/delete'.$ipembayaran->id_pembayaran) ?>')"
                                             href="<?php echo site_url('admin/pembayaran/delete/'.$ipembayaran->id_pembayaran) ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
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
