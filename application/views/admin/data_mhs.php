    <section class="content">
        <div class="container-fluid">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?php echo base_url("admin/tambah_mhs"); ?>" class="btn btn-primary waves-effect"><i class="material-icons">add</i>
                <span>Tambah Mahasiswa</span></a>
            </div>
          </div>
            </br>
            <!-- Striped Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Mahasiswa
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Gender</th>
                                        <th>Tgl Lahir</th>
                                        <th>Agama</th>
                                        <th>Alamat</th>
                                        <th>No.Telp</th>
                                        <th>Email</th>
                                        <th>Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  if( ! empty($mahasiswa)){
                                    foreach($mahasiswa as $data){
                                      echo "<tr>";
                                      echo "<td>".$no++."</td>";
                                      echo "<td>".$data->nim."</td>";
                                      echo "<td>".$data->nama."</td>";
                                      echo "<td>".$data->gender."</td>";
                                      echo "<td>".$data->tgl_lahir."</td>";
                                      echo "<td>".$data->agama."</td>";
                                      echo "<td>".$data->alamat."</td>";
                                      echo "<td>".$data->no_telp."</td>";
                                      echo "<td>".$data->email."</td>";
                                      echo "<td>".$data->foto."</td>";
                                      echo "<td>".anchor('dosen/edit_mhs/'.$data->nim,'Edit','class="btn bg-orange waves-effect"')."</td>";
                                      echo "</tr>";
                                    }
                                  }else{
                                    echo "<tr><td colspan='10'>Data tidak ada</td></tr>";
                                  }
                                  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Striped Rows -->
        </div>
    </section>