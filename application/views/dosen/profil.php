   <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Profil Dosen
                            </h2>
                        </div>
                        <div class="body">
                            <?php foreach ($dosen as $dsn) { ?>
                            <center>
                                <img src="<?php echo base_url('assets/images/'.$dsn->foto);?>" style="width:300px;">
                            </center>
                            </br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <tbody>
                                    
                                        <tr>
                                            <td>NIP</td>
                                            <td><?php echo $dsn->nip?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Dosen</td>
                                            <td><?php echo $dsn->nama_dsn?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td><?php echo $dsn->gender?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td><?php echo $dsn->tgl_lahir?></td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td><?php echo $dsn->agama?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td><?php echo $dsn->alamat?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Telp</td>
                                            <td><?php echo $dsn->no_telp?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $dsn->email?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>