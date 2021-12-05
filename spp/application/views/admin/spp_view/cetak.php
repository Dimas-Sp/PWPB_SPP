<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body class="animsition">
<h1> SMKN 4 BOGOR</h1>


        
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Tahun  Ajaran</th>
                                        <th>Nominal</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($spp as $spp): ?>
                                    <tr>
                                        <td>
                                            <?php echo $spp->tahun ?>
                                        </td>
                                        <td>
                                            <?php echo rupiah($spp->nominal) ?>
                                        </td>

                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    



</body>

</html>
<!-- end document-->
