    <section class="content">
        <div class="container-fluid">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?php echo base_url("admin/tambah_dosen"); ?>" class="btn btn-primary waves-effect"><i class="material-icons">add</i>
                <span>Tambah Dosen</span></a>
            </div>
          </div>
            </br>
            <!-- Striped Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Dosen
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Dosen</th>
                                        <th>Gender</th>
                                        <th>Tgl Lahir</th>
                                        <th>Agama</th>
                                        <th>Alamat</th>
                                        <th>Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  if( ! empty($dosen)){
                                    foreach($dosen as $data){
                                      echo "<tr>";
                                      echo "<td>".$no++."</td>";
                                      echo "<td>".$data->nip."</td>";
                                      echo "<td>".$data->nama_dsn."</td>";
                                      echo "<td>".$data->gender."</td>";
                                      echo "<td>".$data->tgl_lahir."</td>";
                                      echo "<td>".$data->agama."</td>";
                                      echo "<td>".$data->alamat."</td>";
                                      echo "<td>".$data->foto."</td>";
                                      echo "<td>".anchor('dosen/edit_dosen/'.$data->nip,'Edit','class="btn bg-orange waves-effect"')."</td>";
                                      echo "</tr>";
                                    }
                                  }else{
                                    echo "<tr><td colspan='8'>Data tidak ada</td></tr>";
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