   <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Profil Mahasiswa
                            </h2>
                        </div>
                        <div class="body">
                            <?php foreach ($mahasiswa as $mhs) { ?>
                            <center>
                                <img src="<?php echo base_url('assets/images/'.$mhs->foto);?>" style="width:300px;">
                            </center>
                            </br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <tbody>
                                    
                                        <tr>
                                            <td>Nomor Induk Mahasiswa</td>
                                            <td><?php echo $mhs->nim?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Mahasiswa</td>
                                            <td><?php echo $mhs->nama?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td><?php echo $mhs->gender?></td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td><?php echo $mhs->agama?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $mhs->email?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Telp</td>
                                            <td><?php echo $mhs->no_telp?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td><?php echo $mhs->alamat?></td>
                                        </tr>
                                        <tr>
                                            <td>Angkatan</td>
                                            <td><?php echo $mhs->angkatan?></td>
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